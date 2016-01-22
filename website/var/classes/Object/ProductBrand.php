<?php 

/** Generated at 2015-03-11T21:34:05+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class ProductBrand extends Concrete {

public $o_classId = 13;
public $o_className = "ProductBrand";
public $name;


/**
* @param array $values
* @return \Pimcore\Model\Object\ProductBrand
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get name - Name
* @return string
*/
public function getName () {
	$preValue = $this->preGetValue("name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->name;
	return $data;
}

/**
* Set name - Name
* @param string $name
* @return \Pimcore\Model\Object\ProductBrand
*/
public function setName ($name) {
	$this->name = $name;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

