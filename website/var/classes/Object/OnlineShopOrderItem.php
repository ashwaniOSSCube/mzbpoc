<?php 

/** Generated at 2015-05-13T12:56:05+02:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          192.168.9.77
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByOrderState ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByProduct ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByProductNumber ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByProductName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByAmount ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByTotalPrice ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getBySubItems ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByComment ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrderItem getByPricingRules ($value, $limit = 0) 
*/

class OnlineShopOrderItem extends \OnlineShop_Framework_AbstractOrderItem {

public $o_classId = 8;
public $o_className = "OnlineShopOrderItem";
public $orderState;
public $product;
public $productNumber;
public $productName;
public $amount;
public $totalPrice;
public $subItems;
public $comment;
public $pricingRules;


/**
* @param array $values
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get orderState - orderState
* @return string
*/
public function getOrderState () {
	$preValue = $this->preGetValue("orderState"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->orderState;
	return $data;
}

/**
* Set orderState - orderState
* @param string $orderState
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setOrderState ($orderState) {
	$this->orderState = $orderState;
	return $this;
}

/**
* Get product - Produkt
* @return \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject
*/
public function getProduct () {
	$preValue = $this->preGetValue("product"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("product")->preGetData($this);
	return $data;
}

/**
* Set product - Produkt
* @param \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject $product
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setProduct ($product) {
	$this->product = $this->getClass()->getFieldDefinition("product")->preSetData($this, $product);
	return $this;
}

/**
* Get productNumber - Produktnummer
* @return string
*/
public function getProductNumber () {
	$preValue = $this->preGetValue("productNumber"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->productNumber;
	return $data;
}

/**
* Set productNumber - Produktnummer
* @param string $productNumber
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setProductNumber ($productNumber) {
	$this->productNumber = $productNumber;
	return $this;
}

/**
* Get productName - Produktname
* @return string
*/
public function getProductName () {
	$preValue = $this->preGetValue("productName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->productName;
	return $data;
}

/**
* Set productName - Produktname
* @param string $productName
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setProductName ($productName) {
	$this->productName = $productName;
	return $this;
}

/**
* Get amount - Amount
* @return float
*/
public function getAmount () {
	$preValue = $this->preGetValue("amount"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->amount;
	return $data;
}

/**
* Set amount - Amount
* @param float $amount
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setAmount ($amount) {
	$this->amount = $amount;
	return $this;
}

/**
* Get totalPrice - Preis
* @return float
*/
public function getTotalPrice () {
	$preValue = $this->preGetValue("totalPrice"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->totalPrice;
	return $data;
}

/**
* Set totalPrice - Preis
* @param float $totalPrice
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setTotalPrice ($totalPrice) {
	$this->totalPrice = $totalPrice;
	return $this;
}

/**
* Get subItems - Subitems
* @return array
*/
public function getSubItems () {
	$preValue = $this->preGetValue("subItems"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("subItems")->preGetData($this);
	return $data;
}

/**
* Set subItems - Subitems
* @param array $subItems
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setSubItems ($subItems) {
	$this->subItems = $this->getClass()->getFieldDefinition("subItems")->preSetData($this, $subItems);
	return $this;
}

/**
* Get comment - comment
* @return string
*/
public function getComment () {
	$preValue = $this->preGetValue("comment"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->comment;
	return $data;
}

/**
* Set comment - comment
* @param string $comment
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setComment ($comment) {
	$this->comment = $comment;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getPricingRules () {
	$preValue = $this->preGetValue("pricingRules"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("pricingRules")->preGetData($this);
	 return $data;
}

/**
* Set pricingRules - Pricing Rules
* @param \Pimcore\Model\Object\Fieldcollection $pricingRules
* @return \Pimcore\Model\Object\OnlineShopOrderItem
*/
public function setPricingRules ($pricingRules) {
	$this->pricingRules = $this->getClass()->getFieldDefinition("pricingRules")->preSetData($this, $pricingRules);
	return $this;
}

protected static $_relationFields = array (
  'product' => 
  array (
    'type' => 'href',
  ),
  'subItems' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = NULL;

}

