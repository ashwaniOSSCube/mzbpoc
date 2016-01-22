<?php 

/** Generated at 2015-03-11T21:37:03+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class FilterNumberRangeSelection extends \OnlineShop_Framework_AbstractFilterDefinitionType  {

public $type = "FilterNumberRangeSelection";
public $label;
public $field;
public $ranges;
public $preSelectFrom;
public $preSelectTo;
public $scriptPath;
public $unit;


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
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setLabel ($label) {
	$this->label = $label;
	return $this;
}

/**
* Get field - Field
* @return string
*/
public function getField () {
	$data = $this->field;
	 return $data;
}

/**
* Get field - Field
* @param string $field
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setField ($field) {
	$this->field = $field;
	return $this;
}

/**
* Get ranges - Ranges
* @return array
*/
public function getRanges () {
	$data = $this->ranges;
	 return $data;
}

/**
* Get ranges - Ranges
* @param array $ranges
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setRanges ($ranges) {
	$this->ranges = $ranges;
	return $this;
}

/**
* Get preSelectFrom - Pre Select From
* @return float
*/
public function getPreSelectFrom () {
	$data = $this->preSelectFrom;
	 return $data;
}

/**
* Get preSelectFrom - Pre Select From
* @param float $preSelectFrom
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setPreSelectFrom ($preSelectFrom) {
	$this->preSelectFrom = $preSelectFrom;
	return $this;
}

/**
* Get preSelectTo - Pre Select To
* @return float
*/
public function getPreSelectTo () {
	$data = $this->preSelectTo;
	 return $data;
}

/**
* Get preSelectTo - Pre Select To
* @param float $preSelectTo
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setPreSelectTo ($preSelectTo) {
	$this->preSelectTo = $preSelectTo;
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
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setScriptPath ($scriptPath) {
	$this->scriptPath = $scriptPath;
	return $this;
}

/**
* Get unit - Unit
* @return string
*/
public function getUnit () {
	$data = $this->unit;
	 return $data;
}

/**
* Get unit - Unit
* @param string $unit
* @return \Pimcore\Model\Object\FilterNumberRangeSelection
*/
public function setUnit ($unit) {
	$this->unit = $unit;
	return $this;
}

}

