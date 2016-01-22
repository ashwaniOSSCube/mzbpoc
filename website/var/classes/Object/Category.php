<?php 

/** Generated at 2016-01-22T12:38:08+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : demo (3)
* IP:          127.0.0.1
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\Category getByCategory_name ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Category getByCategory_desc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Category getByCategory_img ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Category getByCategory_brand ($value, $limit = 0) 
*/

class Category extends Concrete {

public $o_classId = 36;
public $o_className = "category";
public $category_name;
public $category_desc;
public $category_img;
public $category_brand;


/**
* @param array $values
* @return \Pimcore\Model\Object\Category
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get category_name - category_name
* @return string
*/
public function getCategory_name () {
	$preValue = $this->preGetValue("category_name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->category_name;
	return $data;
}

/**
* Set category_name - category_name
* @param string $category_name
* @return \Pimcore\Model\Object\Category
*/
public function setCategory_name ($category_name) {
	$this->category_name = $category_name;
	return $this;
}

/**
* Get category_desc - category_desc
* @return string
*/
public function getCategory_desc () {
	$preValue = $this->preGetValue("category_desc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->category_desc;
	return $data;
}

/**
* Set category_desc - category_desc
* @param string $category_desc
* @return \Pimcore\Model\Object\Category
*/
public function setCategory_desc ($category_desc) {
	$this->category_desc = $category_desc;
	return $this;
}

/**
* Get category_img - category_img
* @return \Pimcore\Model\Asset\Image
*/
public function getCategory_img () {
	$preValue = $this->preGetValue("category_img"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->category_img;
	return $data;
}

/**
* Set category_img - category_img
* @param \Pimcore\Model\Asset\Image $category_img
* @return \Pimcore\Model\Object\Category
*/
public function setCategory_img ($category_img) {
	$this->category_img = $category_img;
	return $this;
}

/**
* Get category_brand - category_brand
* @return array
*/
public function getCategory_brand () {
	$preValue = $this->preGetValue("category_brand"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("category_brand")->preGetData($this);
	return $data;
}

/**
* Set category_brand - category_brand
* @param array $category_brand
* @return \Pimcore\Model\Object\Category
*/
public function setCategory_brand ($category_brand) {
	$this->category_brand = $this->getClass()->getFieldDefinition("category_brand")->preSetData($this, $category_brand);
	return $this;
}

protected static $_relationFields = array (
  'category_brand' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = NULL;

}

