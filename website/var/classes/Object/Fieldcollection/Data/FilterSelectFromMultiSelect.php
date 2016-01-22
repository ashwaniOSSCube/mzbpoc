<?php 

/** Generated at 2015-03-11T21:37:05+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class FilterSelectFromMultiSelect extends \OnlineShop_Framework_AbstractFilterDefinitionType  {

public $type = "FilterSelectFromMultiSelect";
public $label;
public $field;
public $scriptPath;


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
* @return \Pimcore\Model\Object\FilterSelectFromMultiSelect
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
* @return \Pimcore\Model\Object\FilterSelectFromMultiSelect
*/
public function setField ($field) {
	$this->field = $field;
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
* @return \Pimcore\Model\Object\FilterSelectFromMultiSelect
*/
public function setScriptPath ($scriptPath) {
	$this->scriptPath = $scriptPath;
	return $this;
}

}

