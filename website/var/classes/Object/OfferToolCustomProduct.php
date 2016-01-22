<?php 

/** Generated at 2015-03-11T21:33:51+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class OfferToolCustomProduct extends \OnlineShop_OfferTool_AbstractOfferToolProduct {

public $o_classId = 32;
public $o_className = "OfferToolCustomProduct";
public $OSproductNumber;
public $OSName;
public $price;
public $productGroup;


/**
* @param array $values
* @return \Pimcore\Model\Object\OfferToolCustomProduct
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get OSproductNumber - Productnumber
* @return string
*/
public function getOSproductNumber () {
	$preValue = $this->preGetValue("OSproductNumber"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->OSproductNumber;
	return $data;
}

/**
* Set OSproductNumber - Productnumber
* @param string $OSproductNumber
* @return \Pimcore\Model\Object\OfferToolCustomProduct
*/
public function setOSproductNumber ($OSproductNumber) {
	$this->OSproductNumber = $OSproductNumber;
	return $this;
}

/**
* Get OSName - ProductName
* @return string
*/
public function getOSName () {
	$preValue = $this->preGetValue("OSName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->OSName;
	return $data;
}

/**
* Set OSName - ProductName
* @param string $OSName
* @return \Pimcore\Model\Object\OfferToolCustomProduct
*/
public function setOSName ($OSName) {
	$this->OSName = $OSName;
	return $this;
}

/**
* Get price - Price
* @return float
*/
public function getPrice () {
	$preValue = $this->preGetValue("price"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->price;
	return $data;
}

/**
* Set price - Price
* @param float $price
* @return \Pimcore\Model\Object\OfferToolCustomProduct
*/
public function setPrice ($price) {
	$this->price = $price;
	return $this;
}

/**
* Get productGroup - ProductGroup
* @return string
*/
public function getProductGroup () {
	$preValue = $this->preGetValue("productGroup"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->productGroup;
	return $data;
}

/**
* Set productGroup - ProductGroup
* @param string $productGroup
* @return \Pimcore\Model\Object\OfferToolCustomProduct
*/
public function setProductGroup ($productGroup) {
	$this->productGroup = $productGroup;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

