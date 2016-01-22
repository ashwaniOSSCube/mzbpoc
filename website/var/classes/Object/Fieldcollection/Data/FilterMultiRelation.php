<?php 

/** Generated at 2015-03-11T21:37:02+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class FilterMultiRelation extends \OnlineShop_Framework_AbstractFilterDefinitionType  {

public $type = "FilterMultiRelation";
public $label;
public $field;
public $useAndCondition;
public $scriptPath;
public $availableRelations;


/**
* Get label - Label
* @return string
*/
public function getLabel () {
	$data = $this->label;
	 return $data;
}

/**
* Get label - Label
* @param string $label
* @return \Pimcore\Model\Object\FilterMultiRelation
*/
public function setLabel ($label) {
	$this->label = $label;
	return $this;
}

/**
* Get field - Field
* @return Object_Data_IndexFieldSelection
*/
public function getField () {
	$data = $this->field;
	 return $data;
}

/**
* Get field - Field
* @param Object_Data_IndexFieldSelection $field
* @return \Pimcore\Model\Object\FilterMultiRelation
*/
public function setField ($field) {
	$this->field = $field;
	return $this;
}

/**
* Get useAndCondition - Use And Condition
* @return boolean
*/
public function getUseAndCondition () {
	$data = $this->useAndCondition;
	 return $data;
}

/**
* Get useAndCondition - Use And Condition
* @param boolean $useAndCondition
* @return \Pimcore\Model\Object\FilterMultiRelation
*/
public function setUseAndCondition ($useAndCondition) {
	$this->useAndCondition = $useAndCondition;
	return $this;
}

/**
* Get scriptPath - Script Path
* @return string
*/
public function getScriptPath () {
	$data = $this->scriptPath;
	 return $data;
}

/**
* Get scriptPath - Script Path
* @param string $scriptPath
* @return \Pimcore\Model\Object\FilterMultiRelation
*/
public function setScriptPath ($scriptPath) {
	$this->scriptPath = $scriptPath;
	return $this;
}

/**
* Get availableRelations - Available Relations
* @return array
*/
public function getAvailableRelations () {
	$data = $this->getDefinition()->getFieldDefinition("availableRelations")->preGetData($this);
	 return $data;
}

/**
* Get availableRelations - Available Relations
* @param array $availableRelations
* @return \Pimcore\Model\Object\FilterMultiRelation
*/
public function setAvailableRelations ($availableRelations) {
	$this->availableRelations = $this->getDefinition()->getFieldDefinition("availableRelations")->preSetData($this, $availableRelations);
	return $this;
}

}

