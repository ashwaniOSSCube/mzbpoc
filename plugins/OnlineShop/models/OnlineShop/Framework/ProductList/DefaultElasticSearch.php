<?php
/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


/**
 * Implementation of product list which works based on the product index of the online shop framework
 */
class OnlineShop_Framework_ProductList_DefaultElasticSearch implements OnlineShop_Framework_IProductList {

    /**
     * @var null|OnlineShop_Framework_ProductInterfaces_IIndexable[]
     */
    protected $products = null;

    /**
     * @var string
     */
    protected $tenantName;

    /**
     * @var OnlineShop_Framework_IndexService_Tenant_IElasticSearchConfig
     */
    protected $tenantConfig;

    /**
     * @var null|int
     */
    protected $totalCount = null;

    /**
     * @var string
     */
    protected $variantMode = OnlineShop_Framework_IProductList::VARIANT_MODE_INCLUDE;

    /**
     * @var integer
     */
    protected $limit;

    /**
     * @var string
     */
    protected $order;

    /**
     * @var string
     */
    protected $orderKey;

    /**
     * @var bool
     */
    protected $orderByPrice = false;

    /**
     * @var integer
     */
    protected $offset;

    /**
     * @var OnlineShop_Framework_AbstractCategory
     */
    protected $category;

    /**
     * @var bool
     */
    protected $inProductList;


    /**
     * @var string[][]
     */
    protected $filterConditions = array();

    /**
     * @var string[][]
     */
    protected $queryConditions = array();

    /**
     * @var string[][]
     */
    protected $relationConditions = array();

    /**
     * @var float
     */
    protected $conditionPriceFrom = null;

    /**
     * @var float
     */
    protected $conditionPriceTo = null;

    /**
     * @var array
     */
    protected $preparedGroupByValues = array();

    /**
     * @var array
     */
    protected $preparedGroupByValuesResults = array();

    /**
     * @var bool
     */
    protected $preparedGroupByValuesLoaded = false;


    public function __construct(OnlineShop_Framework_IndexService_Tenant_IElasticSearchConfig $tenantConfig) {
        $this->tenantName = $tenantConfig->getTenantName();
        $this->tenantConfig = $tenantConfig;
    }

    /**
     * Returns all products valid for this search
     *
     * @return OnlineShop_Framework_ProductInterfaces_IIndexable[]
     */
    public function getProducts()
    {
        if ($this->products === null) {
            $this->load();
        }
        return $this->products;
    }

    /**
     * Adds condition to product list
     * Fieldname is optional but highly recommended - needed for resetting condition based on fieldname
     * and exclude functionality in group by results
     *
     * @param string $condition
     * @param string $fieldname - must be set for elastic search
     */
    public function addCondition($condition, $fieldname = "") {
        $this->filterConditions[$fieldname][] = $condition;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * Reset condition for fieldname
     *
     * @param $fieldname
     * @return mixed
     */
    public function resetCondition($fieldname) {
        unset($this->filterConditions[$fieldname]);
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * Adds relation condition to product list
     *
     * @param string $fieldname
     * @param string $condition
     */
    public function addRelationCondition($fieldname, $condition) {
        $this->relationConditions['relations.' . $fieldname][] = $condition;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * Resets all conditions of product list
     */
    public function resetConditions() {
        $this->relationConditions = array();
        $this->filterConditions = array();
        $this->queryConditions = array();
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }


    /**
     * Adds query condition to product list for fulltext search
     * Fieldname is optional but highly recommended - needed for resetting condition based on fieldname
     * and exclude functionality in group by results
     *
     * @param $condition
     * @param string $fieldname - must be set for elastic search
     */
    public function addQueryCondition($condition, $fieldname = "") {
        $this->queryConditions[$fieldname][] = $condition;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * Reset query condition for fieldname
     *
     * @param $fieldname
     * @return mixed
     */
    public function resetQueryCondition($fieldname) {
        unset($this->queryConditions[$fieldname]);
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }


    /**
     * Adds price condition to product list
     *
     * @param null|float $from
     * @param null|float $to
     */
    public function addPriceCondition($from = null, $to = null) {
        $this->conditionPriceFrom = $from;
        $this->conditionPriceTo = $to;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * @param boolean $inProductList
     * @return void
     */
    public function setInProductList($inProductList) {
        $this->inProductList = $inProductList;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * @return boolean
     */
    public function getInProductList() {
        return $this->inProductList;
    }

    /**
     * sets order direction
     *
     * @param $order
     * @return void
     */
    public function setOrder($order) {
        $this->order = $order;
        $this->products = null;
    }

    /**
     * gets order direction
     *
     * @return string
     */
    public function getOrder() {
        return $this->order;
    }

    /**
     * sets order key
     *
     * @param $orderKey string | array  - either single field name, or array of field names or array of arrays (field name, direction)
     * @return void
     */
    public function setOrderKey($orderKey) {
        $this->products = null;
        if($orderKey == OnlineShop_Framework_IProductList::ORDERKEY_PRICE) {
            $this->orderByPrice = true;
        } else {
            $this->orderByPrice = false;
        }

        $this->orderKey = $orderKey;
    }

    /**
     * @return string
     */
    public function getOrderKey() {
        return $this->orderKey;
    }

    /**
     * @param $limit int
     * @return void
     */
    public function setLimit($limit) {
        $this->products = null;
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit() {
        return $this->limit;
    }

    /**
     * @param $offset int
     * @return void
     */
    public function setOffset($offset) {
        $this->products = null;
        $this->offset = $offset;
    }

    /**
     * @return int
     */
    public function getOffset() {
        return $this->offset;
    }

    /**
     * @param $category
     * @return void
     */
    public function setCategory(OnlineShop_Framework_AbstractCategory $category) {
        $this->category = $category;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * @return OnlineShop_Framework_AbstractCategory
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * @param $variantMode
     * @return void
     */
    public function setVariantMode($variantMode) {
        $this->variantMode = $variantMode;
        $this->preparedGroupByValuesLoaded = false;
        $this->products = null;
    }

    /**
     * @return string
     */
    public function getVariantMode() {
        return $this->variantMode;
    }

    /**
     * loads search results from index and returns them
     *
     * @return OnlineShop_Framework_ProductInterfaces_IIndexable[]
     */
    public function load() {

        $objectRaws = [];

        //First case: no price filtering and no price sorting
        if(!$this->orderByPrice && $this->conditionPriceFrom === null && $this->conditionPriceTo === null)
        {
            $objectRaws = $this->loadWithoutPriceFilterWithoutPriceSorting();
        }

        //Second case: no price filtering but price sorting
        else if($this->orderByPrice && $this->conditionPriceFrom === null && $this->conditionPriceTo === null)
        {
            $objectRaws = $this->loadWithoutPriceFilterWithPriceSorting();
        }

        //Third case: price filtering but no price sorting
        else if(!$this->orderByPrice && ($this->conditionPriceFrom !== null || $this->conditionPriceTo !== null))
        {
            $objectRaws = $this->loadWithPriceFilterWithoutPriceSorting();
        }

        //Forth case: price filtering and price sorting
        else if($this->orderByPrice && ($this->conditionPriceFrom !== null || $this->conditionPriceTo !== null))
        {
            $objectRaws = $this->loadWithPriceFilterWithPriceSorting();
        }


        // load elements
        $this->products = array();
        foreach($objectRaws as $raw) {
            $product = $this->loadElementById($raw);
            if($product) {
                $this->products[] = $product;
            }
        }

        return $this->products;
    }


    /**
     * First case: no price filtering and no price sorting
     *
     * @return array
     */
    protected function loadWithoutPriceFilterWithoutPriceSorting()
    {
        $boolFilters = array();
        $queryFilters = array();

        //pre conditions
        $boolFilters = $this->buildSystemConditions($boolFilters);


        //user specific filters
        $boolFilters = $this->buildFilterConditions($boolFilters, array());

        //relation conditions
        $boolFilters = $this->buildRelationConditions($boolFilters, array());


        //query conditions
        $queryFilters = $this->buildQueryConditions($queryFilters, array());

        $params = array();
        $params['index'] = $this->getIndexName();
        $params['type'] = "product";
        $params['body']['_source'] = false;
        $params['body']['size'] = $this->getLimit();
        $params['body']['from'] = $this->getOffset();

        if($this->orderKey) {

            if(is_array($this->orderKey)) {
                foreach($this->orderKey as $orderKey) {
                    $params['body']['sort'][] = [$orderKey[0] => ($orderKey[1] ?: "asc")];
                }
            } else {
                $params['body']['sort'][] = [$this->orderKey => ($this->order ?: "asc")];
            }

        }


        // build query for request
        $params = $this->buildQuery($params, $boolFilters, $queryFilters);


        // send request
        $result = $this->sendRequest( $params );



        $objectRaws = array();
        if($result['hits']) {
            $this->totalCount = $result['hits']['total'];
            foreach($result['hits']['hits'] as $hit) {
                $objectRaws[] = $hit['_id'];
            }
        }


        return $objectRaws;
    }


    /**
     * Second case: no price filtering but price sorting
     *
     * @return array
     * @throws Exception
     * @todo Not implemented yet
     */
    protected function loadWithoutPriceFilterWithPriceSorting()
    {
        //TODO implement this
        throw new Exception("Not implemented yet");
    }


    /**
     * Third case: price filtering but no price sorting
     *
     * @return array
     * @throws Exception
     * @todo Not implemented yet
     */
    protected function loadWithPriceFilterWithoutPriceSorting()
    {
        //TODO implement this
        throw new Exception("Not implemented yet");
    }


    /**
     * Forth case: price filtering and price sorting
     *
     * @return array
     * @throws Exception
     * @todo Not implemented yet
     */
    protected function loadWithPriceFilterWithPriceSorting()
    {
        //TODO implement this
        throw new Exception("Not implemented yet");
    }



    /**
     * build the complete query
     * @param array $params
     * @param array $boolFilters
     * @param array $queryFilters
     *
     * @return array
     */
    protected function buildQuery(array $params, array $boolFilters, array $queryFilters)
    {
        // create query
        if($this->getVariantMode() == OnlineShop_Framework_IProductList::VARIANT_MODE_INCLUDE_PARENT_OBJECT)
        {
            $params['body']['query']['filtered']['query']['has_child']['type'] = 'product';
            $params['body']['query']['filtered']['query']['has_child']['query']['bool']['must'] = $queryFilters;

            $params['body']['query']['filtered']['filter']['has_child']['type'] = 'product';
            $params['body']['query']['filtered']['filter']['has_child']['filter']['bool']['must'] = $boolFilters;
        }
        else
        {
            $params['body']['query']['filtered']['query']['bool']['must'] = $queryFilters;
            $params['body']['query']['filtered']['filter']['bool']['must'] = $boolFilters;
        }


        return $params;
    }


    /**
     * builds system conditions
     *
     * @param array $boolFilters
     * @return array
     */
    protected function buildSystemConditions(array $boolFilters) {
        $boolFilters[] = ['term' => ['system.active' => true]];
        $boolFilters[] = ['term' => ['system.o_virtualProductActive' => true]];
        if($this->inProductList) {
            $boolFilters[] = ['term' => ['system.inProductList' => true]];
        }

        $tenantCondition = $this->tenantConfig->getSubTenantCondition();
        if($tenantCondition) {
            $boolFilters[] = $tenantCondition;
        }

        if($this->getCategory()) {
            $boolFilters[] = ['term' => ['system.parentCategoryIds' => $this->getCategory()->getId()]];
        }


        //variant handling
        $variantMode = $this->getVariantMode();
        if($variantMode == OnlineShop_Framework_IProductList::VARIANT_MODE_HIDE) {
            $boolFilters[] = ['term' => ['system.o_type' => 'object']];
        }

        return $boolFilters;
    }


    /**
     * builds relation conditions of user specific query conditions
     *
     * @param $boolFilters
     * @param $excludedFieldnames
     * @return array
     */
    protected function buildRelationConditions($boolFilters, $excludedFieldnames) {
        foreach ($this->relationConditions as $fieldname => $relationConditionArray) {
            if(!array_key_exists($fieldname, $excludedFieldnames)) {
                foreach ($relationConditionArray as $relationCondition) {
                    if (is_array($relationCondition)) {
                        $boolFilters[] = $relationCondition;
                    } else {
                        $boolFilters[] = ['term' => [$fieldname => $relationCondition]];
                    }
                }
            }
        }
        return $boolFilters;
    }

    /**
     * builds filter condition of user specific conditions
     *
     * @param $boolFilters
     * @param $excludedFieldnames
     * @return array
     */
    protected function buildFilterConditions($boolFilters, $excludedFieldnames) {
        $systemAttributes = $this->tenantConfig->getTenantWorker()->getSystemAttributes(true);
        foreach ($this->filterConditions as $fieldname => $filterConditionArray) {

            if(!array_key_exists($fieldname, $excludedFieldnames)) {
                foreach($filterConditionArray as $filterCondition) {
                    if(is_array($filterCondition)) {
                        $boolFilters[] = $filterCondition;
                    } else {
                        if(array_key_exists($fieldname, $systemAttributes)) {
                            $boolFilters[] = ['term' => ['system.' . $fieldname => $filterCondition]];
                        } else {
                            $boolFilters[] = ['term' => ['attributes.' . $fieldname => $filterCondition]];
                        }
                    }
                }
            }
        }

        return $boolFilters;
    }

    /**
     * builds query condition of query filters
     *
     * @param $queryFilters
     * @param $excludedFieldnames
     * @return array
     */
    protected function buildQueryConditions($queryFilters, $excludedFieldnames) {
        $systemAttributes = $this->tenantConfig->getTenantWorker()->getSystemAttributes(true);
        foreach ($this->queryConditions as $fieldname => $queryConditionArray) {
            if(!array_key_exists($fieldname, $excludedFieldnames)) {
                foreach($queryConditionArray as $queryCondition) {
                    if (is_array($queryCondition)) {
                        $queryFilters[] = $queryCondition;
                    } else {
                        if (array_key_exists($fieldname, $systemAttributes)) {
                            $queryFilters[] = ['match' => ['system.' . $fieldname => $queryCondition]];
                        } else {
                            $queryFilters[] = ['match' => ['attributes.' . $fieldname => $queryCondition]];
                        }
                    }
                }
            }
        }
        return $queryFilters;
    }

    /**
     * loads element by id
     *
     * @param $elementId
     * @return array|OnlineShop_Framework_ProductInterfaces_IIndexable
     */
    protected function loadElementById($elementId) {
        return $this->tenantConfig->getObjectMockupById($elementId);
    }


    /**
     * prepares all group by values for given field names and cache them in local variable
     * considers both - normal values and relation values
     *
     * @param string $fieldname
     * @return void
     */
    public function prepareGroupByValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        $this->preparedGroupByValues['attributes.' . $fieldname] = ["countValues" => $countValues, "fieldnameShouldBeExcluded" => $fieldnameShouldBeExcluded];
        $this->preparedGroupByValuesLoaded = false;
    }


    /**
     * prepares all group by values for given field names and cache them in local variable
     * considers both - normal values and relation values
     *
     * @param string $fieldname
     * @return void
     */
    public function prepareGroupByRelationValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        $this->preparedGroupByValues['relations.' . $fieldname] = ["countValues" => $countValues, "fieldnameShouldBeExcluded" => $fieldnameShouldBeExcluded];
        $this->preparedGroupByValuesLoaded = false;
    }


    /**
     * prepares all group by values for given field names and cache them in local variable
     * considers both - normal values and relation values
     *
     * @param string $fieldname
     * @return void
     */
    public function prepareGroupBySystemValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        $this->preparedGroupByValues['system.' . $fieldname] = ["countValues" => $countValues, "fieldnameShouldBeExcluded" => $fieldnameShouldBeExcluded];
        $this->preparedGroupByValuesLoaded = false;
    }


    /**
     * resets all set prepared group by values
     *
     * @return void
     */
    public function resetPreparedGroupByValues() {
        $this->preparedGroupByValuesLoaded = false;
        $this->preparedGroupByValues = array();
        $this->preparedGroupByValuesResults = array();
    }

    /**
     * loads group by values based on system either from local variable if prepared or directly from product index
     *
     * @param $fieldname
     * @param bool $countValues
     * @param bool $fieldnameShouldBeExcluded => set to false for and-conditions
     *
     * @return array
     * @throws Exception
     */
    public function getGroupBySystemValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        return $this->doGetGroupByValues('system.' . $fieldname, $countValues, $fieldnameShouldBeExcluded);
    }

    /**
     * loads group by values based on fieldname either from local variable if prepared or directly from product index
     *
     * @param $fieldname
     * @param bool $countValues
     * @param bool $fieldnameShouldBeExcluded => set to false for and-conditions
     *
     * @return array
     * @throws Exception
     */
    public function getGroupByValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        return $this->doGetGroupByValues('attributes.' . $fieldname, $countValues, $fieldnameShouldBeExcluded);
    }

    /**
     * loads group by values based on relation fieldname either from local variable if prepared or directly from product index
     *
     * @param      $fieldname
     * @param bool $countValues
     * @param bool $fieldnameShouldBeExcluded => set to false for and-conditions
     *
     * @return array
     * @throws Exception
     */
    public function getGroupByRelationValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        return $this->doGetGroupByValues('relations.' . $fieldname, $countValues, $fieldnameShouldBeExcluded);
    }

    /**
     * checks if group by values are loaded and returns them
     *
     * @param $fieldname
     * @param bool $countValues
     * @param bool $fieldnameShouldBeExcluded
     * @return array
     */
    protected function doGetGroupByValues($fieldname, $countValues = false, $fieldnameShouldBeExcluded = true) {
        if(!$this->preparedGroupByValuesLoaded) {
            $this->doLoadGroupByValues();
        }

        $results = $this->preparedGroupByValuesResults[$fieldname];
        if($results) {
            if($countValues) {
                return $results;
            } else {
                $resultsWithoutCounts = array();
                foreach($results as $result) {
                    $resultsWithoutCounts[] = $result['value'];
                }
                return $resultsWithoutCounts;
            }
        } else {
            return [];
        }
    }


    /**
     * loads all prepared group by values
     *   1 - get general filter (= filter of fields don't need to be considered in group by values or where fieldnameShouldBeExcluded set to false)
     *   2 - for each group by value create a own aggregation section with all other group by filters added
     *
     * @throws Exception
     */
    protected function doLoadGroupByValues() {
        // create general filters and queries
        $toExcludeFieldnames = array();
        foreach($this->preparedGroupByValues as $fieldname => $config) {
            if($config['fieldnameShouldBeExcluded']) {
                $toExcludeFieldnames[$fieldname] = $fieldname;
            }
        }

        $boolFilters = array();
        $queryFilters = array();

        //pre conditions
        $boolFilters = $this->buildSystemConditions($boolFilters);

        //user specific filters
        $boolFilters = $this->buildFilterConditions($boolFilters, $toExcludeFieldnames);

        //relation conditions
        $boolFilters = $this->buildRelationConditions($boolFilters, $toExcludeFieldnames);

        //query conditions
        $queryFilters = $this->buildQueryConditions($queryFilters, array());


        $aggregations = array();

        //calculate already filtered attributes
        $filteredFieldnames = array();
        foreach($this->filterConditions as $fieldname => $condition) {
            if(!array_key_exists($fieldname, $toExcludeFieldnames)) {
                $filteredFieldnames[$fieldname] = $fieldname;
            }
        }
        foreach($this->relationConditions as $fieldname => $condition) {
            if(!array_key_exists($fieldname, $toExcludeFieldnames)) {
                $filteredFieldnames[$fieldname] = $fieldname;
            }
        }

        foreach($this->preparedGroupByValues as $fieldname => $config) {

            //toexclude sind alle, die schon gefiltert wurden + fieldname

            $specificFilters = array();
            //user specific filters
            $specificFilters = $this->buildFilterConditions($specificFilters, array_merge($filteredFieldnames, [$fieldname => $fieldname]));
            //relation conditions
            $specificFilters = $this->buildRelationConditions($specificFilters, array_merge($filteredFieldnames, [$fieldname => $fieldname]));

            if($specificFilters) {
                $aggregations[$fieldname] = [
                    'filter' => [
                        'bool' => [
                            'must' => $specificFilters
                        ]
                    ],
                    'aggs' => [
                        $fieldname => [
                            "terms" => ['field' => $fieldname, 'size' => 0, "order" => ["_term" => "asc" ]]
                        ]
                    ]
                ];
            } else {
                $aggregations[$fieldname] = [
                    "terms" => ['field' => $fieldname, 'size' => 0, "order" => ["_term" => "asc" ]]
                ];
            }

        }

        if($aggregations) {
            $params = array();
            $params['index'] = $this->getIndexName();
            $params['type'] = "product";
            $params['search_type'] = "count";
            $params['body']['_source'] = false;
            $params['body']['size'] = $this->getLimit();
            $params['body']['from'] = $this->getOffset();
            $params['body']['aggs'] = $aggregations;


            // build query for request
            $params = $this->buildQuery($params, $boolFilters, $queryFilters);

            // send request
            $result = $this->sendRequest( $params );


            if($result['aggregations']) {
                foreach($result['aggregations'] as $fieldname => $aggregation) {
                    if($aggregation['buckets']) {
                        $buckets = $aggregation['buckets'];
                    } else {
                        $buckets = $aggregation[$fieldname]['buckets'];
                    }

                    $groupByValueResult = array();
                    if($buckets) {
                        foreach($buckets as $bucket) {
                            $groupByValueResult[] = ['value' => $bucket['key'], 'count' => $bucket['doc_count']];
                        }
                    }

                    $this->preparedGroupByValuesResults[$fieldname] = $groupByValueResult;
                }
            }
        } else {
            $this->preparedGroupByValuesResults = array();
        }


        $this->preparedGroupByValuesLoaded = true;
    }


    /**
     * send a request to elasticsearch
     * @param array $params
     *
     * @return array
     */
    protected function sendRequest(array $params)
    {
        /**
         * @var $esClient \Elasticsearch\Client
         */

        // ElasticSearch Client
//        $esClient = $this->tenantConfig->getTenantWorker()->getElasticSearchClient();


        // Zend HTTP Client
        $config =  $this->tenantConfig->getElasticSearchClientParams();
        $esClient = new Zend_Http_Client(sprintf('http://%s:9200/%s/%s/_search?%s'
            , $config['hosts'][0]
            , $params['index']
            , $params['type']
            , $params['search_type'] ?: ''
        ));


        if($esClient instanceof \Elasticsearch\Client)
        {
            $result = $esClient->search($params);
        }
        else if($esClient instanceof Zend_Http_Client)
        {
            $esClient->setMethod( Zend_Http_Client::GET );
            $esClient->setRawData( json_encode($params['body']) );

            $result = $esClient->request();
            $result = json_decode($result->getBody(), true);
        }

        return $result;
    }


    /**
     * @return string
     */
    protected function getIndexName()
    {
        $generalSettings = $this->tenantConfig->getGeneralSettings();
        if($generalSettings['indexName']){
            $index = $generalSettings['indexName'];
        }else{
            $index = strtolower($this->tenantConfig->getTenantName());
        }

        return $index;
    }


    /**
     *  -----------------------------------------------------------------------------------------
     *   Methods for Zend_Paginator_Adapter_Interface, Zend_Paginator_AdapterAggregate, Iterator
     *  -----------------------------------------------------------------------------------------
     */

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count() {
        if($this->totalCount === null) {
            $this->load();
        }
        return $this->totalCount;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current() {
        $this->getProducts();
        $var = current($this->products);
        return $var;
    }

    /**
     * Returns an collection of items for a page.
     *
     * @param  integer $offset Page offset
     * @param  integer $itemCountPerPage Number of items per page
     * @return array
     */
    public function getItems($offset, $itemCountPerPage) {

        // clear current items
        if($this->getOffset() != $offset || $this->getLimit() != $itemCountPerPage)
        {
            $this->products = null;
        }

        $this->setOffset($offset);
        $this->setLimit($itemCountPerPage);

        return $this->getProducts();
    }

    /**
     * Return a fully configured Paginator Adapter from this method.
     *
     * @return Zend_Paginator_Adapter_Interface
     */
    public function getPaginatorAdapter() {
        return $this;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return scalar scalar on success, integer
     * 0 on failure.
     */
    public function key() {
        $this->getProducts();
        $var = key($this->products);
        return $var;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next() {
        $this->getProducts();
        $var = next($this->products);
        return $var;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind() {
        $this->getProducts();
        reset($this->products);
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid() {
        $var = $this->current() !== false;
        return $var;
    }

}