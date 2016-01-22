<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mmoser
 * Date: 26.04.13
 * Time: 13:46
 * To change this template use File | Settings | File Templates.
 */

class ShopController extends Website_Controller_Action
{

    public function init() {
        parent::init();
        $params = $this->getAllParams();
        $this->view->category = Website_ShopCategory::getById($params['category']);
    }

    /**
     * show product list
     */
    public function listAction()
    {

        $params = $this->getAllParams();
        $params["parentCategoryIds"] = $params['category'];

        $category = Object_ProductCategory::getById($params['category']);

        // load current filter
        if($category) {
            $filterDefinition = $category->getFilterdefinition();
        }

        if($this->getParam("filterdefinition") instanceof Object_FilterDefinition) {
            $filterDefinition = $this->getParam("filterdefinition");
        }


        if(empty($filterDefinition)) {
            $filterDefinition = Pimcore_Config::getWebsiteConfig()->fallbackFilterdefinition;
        }
        $this->view->filterDefinitionObject = $filterDefinition;


        // create product list
        $products = OnlineShop_Framework_Factory::getInstance()->getIndexService()->getProductListForCurrentTenant();
        $products->setVariantMode(OnlineShop_Framework_IProductList::VARIANT_MODE_INCLUDE_PARENT_OBJECT);

        $this->view->products = $products;

        // create and init filter service
        $filterService = OnlineShop_Framework_Factory::getInstance()->getFilterService($this->view);


        OnlineShop_Framework_FilterService_Helper::setupProductList($filterDefinition, $products, $params, $this->view, $filterService, true);
        $this->view->filterService = $filterService;


        // init pagination
        $paginator = Zend_Paginator::factory( $products );
        $paginator->setCurrentPageNumber( $this->getParam('page') );
        $paginator->setItemCountPerPage( $filterDefinition->getPageLimit() );
        $paginator->setPageRange(10);
        $this->view->paginator = $paginator;


        // print page with layout or only the list for ajax requests
        if($this->getRequest()->isXmlHttpRequest() === false)
        {
            $this->enableLayout();
        }
        else
        {
            // infinity scrolling?
            if($this->getParam('infinity'))
            {
                $this->renderScript('/shop/list/products.php');
            }
        }
    }


    /**
     * show product detail page
     * @throws Zend_Controller_Router_Exception
     */
    public function detailAction() {
        $this->enableLayout();

        // load product
        $product = Website_DefaultProduct::getById($this->getParam("product"));
        if(!$product || !$product->isActive()) {
            throw new Zend_Controller_Router_Exception("die gewünschte Seite existiert nicht mehr");
        }
        $this->view->product = $product;

        $category = Object_ProductCategory::getById($this->getParam("category"));


        // ...
        $this->view->specificationOutputChannel =  Elements\OutputDataConfigToolkit\Service::getOutputDataConfig($product, "productdetail_specification");
        $this->view->hasSpec = false;
        foreach($this->view->specificationOutputChannel as $x) {
            if($x->getLabeledValue($product)) {
                $this->view->hasSpec = true;
                break;
            }
        }

        // recently viewed products
        $recently = new Website_OnlineShop_Demo_OnlineShop_RecentlyViewedProducts( OnlineShop_Framework_Factory::getInstance()->getEnvironment(), function($id) {
            return Website_DefaultProduct::getById($id);
        });


        $sizeVariants = $product->getSizeVariants();
        if(empty($sizeVariants)) {
            $linkProduct = $product;
        } else {
            $linkProduct = array_shift(array_values($sizeVariants));
        }
        $this->view->recentlyViewed = $recently->addProduct( $linkProduct )->getProducts(4);

        $filterdefinition = null;
        if($category) {
            $filterdefinition = $category->getFilterdefinition();
        }
        if(empty($filterdefinition)) {
            $filterdefinition = Pimcore_Config::getWebsiteConfig()->fallbackFilterdefinition;
        }
        $this->view->similarProducts = $this->getSimilarProducts($product, $filterdefinition);

    }


    private function getSimilarProducts(Website_DefaultProduct $product, Object_FilterDefinition $filterDefinition = null) {

        if($filterDefinition) {

            $productList = OnlineShop_Framework_Factory::getInstance()->getIndexService()->getProductListForCurrentTenant();;
            $productList->setVariantMode(OnlineShop_Framework_IProductList::VARIANT_MODE_INCLUDE_PARENT_OBJECT);

            $similarityFields = $filterDefinition->getSimilarityFields();
            if($similarityFields) {
                $statement = $productList->buildSimularityOrderBy($filterDefinition->getSimilarityFields(), $product->getId());
            }

            if(!empty($statement)) {
                $productList->setLimit(2);
                $productList->setOrder("ASC");
                $productList->addCondition("o_virtualProductId != " . $product->internalGetBaseProduct()->getId(), "o_id");
                if($filterDefinition->getCrossSellingCategory()) {
                    $productList->setCategory($filterDefinition->getCrossSellingCategory());
                }
                $productList->setOrderKey($statement);

                return $productList->load();
            }
        }
        return array();

    }



    public function productCellAction() {
        if($this->getParam("type") == "object") {
            $this->view->product = Object_Product::getById($this->getParam("id"));
            $this->view->view = $this->view;
            $this->view->view->params = array("country" => $this->getParam("country"));
        }
        $this->renderScript('/shop/list/product.php');
    }


    public function searchAction() {

        $values = array();

        $productList = OnlineShop_Framework_Factory::getInstance()->getIndexService()->getProductListForCurrentTenant();;
        $productList->setVariantMode(OnlineShop_Framework_IProductList::VARIANT_MODE_INCLUDE_PARENT_OBJECT);
        if($this->getParam("term")) {
            //$productList->addQueryCondition($this->getParam("term"));

            foreach(explode(" ", $this->getParam("term")) as $term) {
                $productList->addQueryCondition($term, "search");
            }
        }


        if($this->getParam("showResultPage")) {

            $params = $this->getAllParams();
            if(empty($filterDefinition)) {
                $filterDefinition = Pimcore_Config::getWebsiteConfig()->searchFilterdefinition;
            }
            $this->view->filterDefinitionObject = $filterDefinition;

            // create and init filter service
            $filterService = OnlineShop_Framework_Factory::getInstance()->getFilterService($this->view);

            OnlineShop_Framework_FilterService_Helper::setupProductList($filterDefinition, $productList, $params, $this->view, $filterService, true);
            $this->view->filterService = $filterService;
            $this->view->products = $productList;

            // init pagination
            $paginator = Zend_Paginator::factory( $productList );
            $paginator->setCurrentPageNumber( $this->getParam('page') );
            $paginator->setItemCountPerPage( $filterDefinition->getPageLimit() );
            $paginator->setPageRange(10);
            $this->view->paginator = $paginator;

            // print page with layout or only the list for ajax requests
            if($this->getRequest()->isXmlHttpRequest() === false)
            {
                $this->enableLayout();
            }
            else
            {
                // infinity scrolling?
                if($this->getParam('infinity'))
                {
                    $this->renderScript('/shop/list/products.php');
                }
            }


        } else {
            $productList->setLimit(10);

            foreach($productList as $p) {
                $firstSizeVariants = $p->getColorVariants(true);
                if(count($firstSizeVariants) == 0) {
                    // keine varianten verfügbar
                    $linkProduct = $p;
                } else {
                    $linkProduct = $firstSizeVariants[0];
                }

                $values[] = array("id" => $p->getId(), "value" => $p->getName(), "label" => $p->getName(), "url" => $linkProduct->getShopDetailLink($this->view));
            }
            $this->_helper->json($values);
        }

    }

}