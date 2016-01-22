<?php 

/** Generated at 2015-03-13T16:30:43+01:00 */

/**
* Inheritance: yes
* Variants   : no
* Changed by : admin (2)
* IP:          192.168.11.119
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\FilterDefinition getByPageLimit ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByAjaxReload ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByInfiniteScroll ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByLimitOnFirstLoad ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByOrderByAsc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByOrderByDesc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByDefaultOrderByInheritance ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByDefaultOrderBy ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByConditionsInheritance ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByConditions ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByFiltersInheritance ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByFilters ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getByCrossSellingCategory ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getBySimilarityFieldsInheritance ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\FilterDefinition getBySimilarityFields ($value, $limit = 0) 
*/

class FilterDefinition extends \OnlineShop_Framework_AbstractFilterDefinition {

public $o_classId = 7;
public $o_className = "FilterDefinition";
public $pageLimit;
public $ajaxReload;
public $infiniteScroll;
public $limitOnFirstLoad;
public $orderByAsc;
public $orderByDesc;
public $defaultOrderByInheritance;
public $defaultOrderBy;
public $conditionsInheritance;
public $conditions;
public $filtersInheritance;
public $filters;
public $crossSellingCategory;
public $similarityFieldsInheritance;
public $similarityFields;


/**
* @param array $values
* @return \Pimcore\Model\Object\FilterDefinition
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get pageLimit - Results per Page
* @return float
*/
public function getPageLimit () {
	$preValue = $this->preGetValue("pageLimit"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->pageLimit;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("pageLimit")->isEmpty($data)) {
		return $this->getValueFromParent("pageLimit");
	}
	return $data;
}

/**
* Set pageLimit - Results per Page
* @param float $pageLimit
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setPageLimit ($pageLimit) {
	$this->pageLimit = $pageLimit;
	return $this;
}

/**
* Get ajaxReload - ajaxReload
* @return boolean
*/
public function getAjaxReload () {
	$preValue = $this->preGetValue("ajaxReload"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->ajaxReload;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("ajaxReload")->isEmpty($data)) {
		return $this->getValueFromParent("ajaxReload");
	}
	return $data;
}

/**
* Set ajaxReload - ajaxReload
* @param boolean $ajaxReload
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setAjaxReload ($ajaxReload) {
	$this->ajaxReload = $ajaxReload;
	return $this;
}

/**
* Get infiniteScroll - Infinite Scroll
* @return boolean
*/
public function getInfiniteScroll () {
	$preValue = $this->preGetValue("infiniteScroll"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->infiniteScroll;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("infiniteScroll")->isEmpty($data)) {
		return $this->getValueFromParent("infiniteScroll");
	}
	return $data;
}

/**
* Set infiniteScroll - Infinite Scroll
* @param boolean $infiniteScroll
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setInfiniteScroll ($infiniteScroll) {
	$this->infiniteScroll = $infiniteScroll;
	return $this;
}

/**
* Get limitOnFirstLoad - Limit on First Load
* @return float
*/
public function getLimitOnFirstLoad () {
	$preValue = $this->preGetValue("limitOnFirstLoad"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->limitOnFirstLoad;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("limitOnFirstLoad")->isEmpty($data)) {
		return $this->getValueFromParent("limitOnFirstLoad");
	}
	return $data;
}

/**
* Set limitOnFirstLoad - Limit on First Load
* @param float $limitOnFirstLoad
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setLimitOnFirstLoad ($limitOnFirstLoad) {
	$this->limitOnFirstLoad = $limitOnFirstLoad;
	return $this;
}

/**
* Get orderByAsc - OrderBy Ascending
* @return string
*/
public function getOrderByAsc () {
	$preValue = $this->preGetValue("orderByAsc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->orderByAsc;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("orderByAsc")->isEmpty($data)) {
		return $this->getValueFromParent("orderByAsc");
	}
	return $data;
}

/**
* Set orderByAsc - OrderBy Ascending
* @param string $orderByAsc
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setOrderByAsc ($orderByAsc) {
	$this->orderByAsc = $orderByAsc;
	return $this;
}

/**
* Get orderByDesc - OrderBy Descending
* @return string
*/
public function getOrderByDesc () {
	$preValue = $this->preGetValue("orderByDesc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->orderByDesc;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("orderByDesc")->isEmpty($data)) {
		return $this->getValueFromParent("orderByDesc");
	}
	return $data;
}

/**
* Set orderByDesc - OrderBy Descending
* @param string $orderByDesc
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setOrderByDesc ($orderByDesc) {
	$this->orderByDesc = $orderByDesc;
	return $this;
}

/**
* Get defaultOrderByInheritance - inherit Default OrderBy
* @return string
*/
public function getDefaultOrderByInheritance () {
	$preValue = $this->preGetValue("defaultOrderByInheritance"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->defaultOrderByInheritance;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("defaultOrderByInheritance")->isEmpty($data)) {
		return $this->getValueFromParent("defaultOrderByInheritance");
	}
	return $data;
}

/**
* Set defaultOrderByInheritance - inherit Default OrderBy
* @param string $defaultOrderByInheritance
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setDefaultOrderByInheritance ($defaultOrderByInheritance) {
	$this->defaultOrderByInheritance = $defaultOrderByInheritance;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getDefaultOrderBy () {
	$preValue = $this->preGetValue("defaultOrderBy"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("defaultOrderBy")->preGetData($this);
	 return $data;
}

/**
* Set defaultOrderBy - Default OrderBy
* @param \Pimcore\Model\Object\Fieldcollection $defaultOrderBy
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setDefaultOrderBy ($defaultOrderBy) {
	$this->defaultOrderBy = $this->getClass()->getFieldDefinition("defaultOrderBy")->preSetData($this, $defaultOrderBy);
	return $this;
}

/**
* Get conditionsInheritance - inherit Conditions
* @return string
*/
public function getConditionsInheritance () {
	$preValue = $this->preGetValue("conditionsInheritance"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->conditionsInheritance;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("conditionsInheritance")->isEmpty($data)) {
		return $this->getValueFromParent("conditionsInheritance");
	}
	return $data;
}

/**
* Set conditionsInheritance - inherit Conditions
* @param string $conditionsInheritance
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setConditionsInheritance ($conditionsInheritance) {
	$this->conditionsInheritance = $conditionsInheritance;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getConditions () {
	$preValue = $this->preGetValue("conditions"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("conditions")->preGetData($this);
	 return $data;
}

/**
* Set conditions - Conditions
* @param \Pimcore\Model\Object\Fieldcollection $conditions
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setConditions ($conditions) {
	$this->conditions = $this->getClass()->getFieldDefinition("conditions")->preSetData($this, $conditions);
	return $this;
}

/**
* Get filtersInheritance - inherit Filters
* @return string
*/
public function getFiltersInheritance () {
	$preValue = $this->preGetValue("filtersInheritance"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->filtersInheritance;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("filtersInheritance")->isEmpty($data)) {
		return $this->getValueFromParent("filtersInheritance");
	}
	return $data;
}

/**
* Set filtersInheritance - inherit Filters
* @param string $filtersInheritance
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setFiltersInheritance ($filtersInheritance) {
	$this->filtersInheritance = $filtersInheritance;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getFilters () {
	$preValue = $this->preGetValue("filters"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("filters")->preGetData($this);
	 return $data;
}

/**
* Set filters - Filters
* @param \Pimcore\Model\Object\Fieldcollection $filters
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setFilters ($filters) {
	$this->filters = $this->getClass()->getFieldDefinition("filters")->preSetData($this, $filters);
	return $this;
}

/**
* Get crossSellingCategory - Base category for recommendations
* @return \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject
*/
public function getCrossSellingCategory () {
	$preValue = $this->preGetValue("crossSellingCategory"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("crossSellingCategory")->preGetData($this);
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("crossSellingCategory")->isEmpty($data)) {
		return $this->getValueFromParent("crossSellingCategory");
	}
	return $data;
}

/**
* Set crossSellingCategory - Base category for recommendations
* @param \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject $crossSellingCategory
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setCrossSellingCategory ($crossSellingCategory) {
	$this->crossSellingCategory = $this->getClass()->getFieldDefinition("crossSellingCategory")->preSetData($this, $crossSellingCategory);
	return $this;
}

/**
* Get similarityFieldsInheritance - inherit SimilarityFields
* @return string
*/
public function getSimilarityFieldsInheritance () {
	$preValue = $this->preGetValue("similarityFieldsInheritance"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->similarityFieldsInheritance;
	if(\Pimcore\Model\Object::doGetInheritedValues() && $this->getClass()->getFieldDefinition("similarityFieldsInheritance")->isEmpty($data)) {
		return $this->getValueFromParent("similarityFieldsInheritance");
	}
	return $data;
}

/**
* Set similarityFieldsInheritance - inherit SimilarityFields
* @param string $similarityFieldsInheritance
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setSimilarityFieldsInheritance ($similarityFieldsInheritance) {
	$this->similarityFieldsInheritance = $similarityFieldsInheritance;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getSimilarityFields () {
	$preValue = $this->preGetValue("similarityFields"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("similarityFields")->preGetData($this);
	 return $data;
}

/**
* Set similarityFields - SimilarityFields
* @param \Pimcore\Model\Object\Fieldcollection $similarityFields
* @return \Pimcore\Model\Object\FilterDefinition
*/
public function setSimilarityFields ($similarityFields) {
	$this->similarityFields = $this->getClass()->getFieldDefinition("similarityFields")->preSetData($this, $similarityFields);
	return $this;
}

protected static $_relationFields = array (
  'crossSellingCategory' => 
  array (
    'type' => 'href',
  ),
);

public $lazyLoadedFields = NULL;

}

