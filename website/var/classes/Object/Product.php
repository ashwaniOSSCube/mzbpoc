<?php 

/** Generated at 2016-01-22T12:38:24+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : demo (3)
* IP:          127.0.0.1
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\Product getByProduct_name ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_desc ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_image ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_price ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_cat ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_reviews ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\Product getByProduct_reliability ($value, $limit = 0) 
*/

class Product extends Concrete {

public $o_classId = 12;
public $o_className = "Product";
public $product_name;
public $product_desc;
public $product_image;
public $product_price;
public $product_cat;
public $product_reviews;
public $product_reliability;


/**
* @param array $values
* @return \Pimcore\Model\Object\Product
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get product_name - product_name
* @return string
*/
public function getProduct_name () {
	$preValue = $this->preGetValue("product_name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_name;
	return $data;
}

/**
* Set product_name - product_name
* @param string $product_name
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_name ($product_name) {
	$this->product_name = $product_name;
	return $this;
}

/**
* Get product_desc - product_desc
* @return string
*/
public function getProduct_desc () {
	$preValue = $this->preGetValue("product_desc"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_desc;
	return $data;
}

/**
* Set product_desc - product_desc
* @param string $product_desc
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_desc ($product_desc) {
	$this->product_desc = $product_desc;
	return $this;
}

/**
* Get product_image - product_image
* @return \Pimcore\Model\Asset\Image
*/
public function getProduct_image () {
	$preValue = $this->preGetValue("product_image"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_image;
	return $data;
}

/**
* Set product_image - product_image
* @param \Pimcore\Model\Asset\Image $product_image
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_image ($product_image) {
	$this->product_image = $product_image;
	return $this;
}

/**
* Get product_price - product_price
* @return float
*/
public function getProduct_price () {
	$preValue = $this->preGetValue("product_price"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_price;
	return $data;
}

/**
* Set product_price - product_price
* @param float $product_price
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_price ($product_price) {
	$this->product_price = $product_price;
	return $this;
}

/**
* Get product_cat - product_cat
* @return array
*/
public function getProduct_cat () {
	$preValue = $this->preGetValue("product_cat"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("product_cat")->preGetData($this);
	return $data;
}

/**
* Set product_cat - product_cat
* @param array $product_cat
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_cat ($product_cat) {
	$this->product_cat = $this->getClass()->getFieldDefinition("product_cat")->preSetData($this, $product_cat);
	return $this;
}

/**
* Get product_reviews - product_reviews
* @return float
*/
public function getProduct_reviews () {
	$preValue = $this->preGetValue("product_reviews"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_reviews;
	return $data;
}

/**
* Set product_reviews - product_reviews
* @param float $product_reviews
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_reviews ($product_reviews) {
	$this->product_reviews = $product_reviews;
	return $this;
}

/**
* Get product_reliability - product_reliability
* @return float
*/
public function getProduct_reliability () {
	$preValue = $this->preGetValue("product_reliability"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->product_reliability;
	return $data;
}

/**
* Set product_reliability - product_reliability
* @param float $product_reliability
* @return \Pimcore\Model\Object\Product
*/
public function setProduct_reliability ($product_reliability) {
	$this->product_reliability = $product_reliability;
	return $this;
}

protected static $_relationFields = array (
  'product_cat' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = NULL;

}

