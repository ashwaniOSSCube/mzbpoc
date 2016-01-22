<?php 

/** Generated at 2015-03-11T21:37:05+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class OrderByFields extends Object\Fieldcollection\Data\AbstractData  {

public $type = "OrderByFields";
public $field;
public $direction;


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
* @return \Pimcore\Model\Object\OrderByFields
*/
public function setField ($field) {
	$this->field = $field;
	return $this;
}

/**
* Get direction - Direction
* @return string
*/
public function getDirection () {
	$data = $this->direction;
	 return $data;
}

/**
* Get direction - Direction
* @param string $direction
* @return \Pimcore\Model\Object\OrderByFields
*/
public function setDirection ($direction) {
	$this->direction = $direction;
	return $this;
}

}

