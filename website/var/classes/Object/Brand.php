<?php 

/** Generated at 2016-01-22T12:38:07+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : demo (3)
* IP:          127.0.0.1
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\Brand getByBrand_name ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Brand getByBrand_desc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Brand getByBrand_image ($value, $limit = 0) 
*/

class Brand extends Concrete {

public $o_classId = 35;
public $o_className = "brand";
public $brand_name;
public $brand_desc;
public $brand_image;


/**
* @param array $values
* @return \Pimcore\Model\Object\Brand
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get brand_name - brand_name
* @return string
*/
public function getBrand_name () {
	$preValue = $this->preGetValue("brand_name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->brand_name;
	return $data;
}

/**
* Set brand_name - brand_name
* @param string $brand_name
* @return \Pimcore\Model\Object\Brand
*/
public function setBrand_name ($brand_name) {
	$this->brand_name = $brand_name;
	return $this;
}

/**
* Get brand_desc - brand_desc
* @return string
*/
public function getBrand_desc () {
	$preValue = $this->preGetValue("brand_desc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->brand_desc;
	return $data;
}

/**
* Set brand_desc - brand_desc
* @param string $brand_desc
* @return \Pimcore\Model\Object\Brand
*/
public function setBrand_desc ($brand_desc) {
	$this->brand_desc = $brand_desc;
	return $this;
}

/**
* Get brand_image - brand_image
* @return \Pimcore\Model\Asset\Image
*/
public function getBrand_image () {
	$preValue = $this->preGetValue("brand_image"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->brand_image;
	return $data;
}

/**
* Set brand_image - brand_image
* @param \Pimcore\Model\Asset\Image $brand_image
* @return \Pimcore\Model\Object\Brand
*/
public function setBrand_image ($brand_image) {
	$this->brand_image = $brand_image;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

