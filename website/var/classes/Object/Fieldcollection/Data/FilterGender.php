<?php 

/** Generated at 2015-03-11T21:37:01+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class FilterGender extends Object\Fieldcollection\Data\AbstractData  {

public $type = "FilterGender";
public $label;
public $scriptPath;
public $field;


/**
* Get label - label
* @return string
*/
public function getLabel () {
	$data = $this->label;
	 return $data;
}

/**
* Get label - label
* @param string $label
* @return \Pimcore\Model\Object\FilterGender
*/
public function setLabel ($label) {
	$this->label = $label;
	return $this;
}

/**
* Get scriptPath - scriptPath
* @return string
*/
public function getScriptPath () {
	$data = $this->scriptPath;
	 return $data;
}

/**
* Get scriptPath - scriptPath
* @param string $scriptPath
* @return \Pimcore\Model\Object\FilterGender
*/
public function setScriptPath ($scriptPath) {
	$this->scriptPath = $scriptPath;
	return $this;
}

/**
* Get field - field
* @return Object_Data_IndexFieldSelection
*/
public function getField () {
	$data = $this->field;
	 return $data;
}

/**
* Get field - field
* @param Object_Data_IndexFieldSelection $field
* @return \Pimcore\Model\Object\FilterGender
*/
public function setField ($field) {
	$this->field = $field;
	return $this;
}

}

