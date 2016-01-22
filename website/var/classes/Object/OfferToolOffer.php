<?php 

/** Generated at 2015-03-11T21:33:52+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class OfferToolOffer extends \OnlineShop_OfferTool_AbstractOffer {

public $o_classId = 30;
public $o_className = "OfferToolOffer";
public $offernumber;
public $dateCreated;
public $dateValidUntil;
public $totalPriceBeforeDiscount;
public $totalPrice;
public $discount;
public $discountType;
public $items;
public $customItems;
public $cartId;


/**
* @param array $values
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get offernumber - Offernumber
* @return string
*/
public function getOffernumber () {
	$preValue = $this->preGetValue("offernumber"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->offernumber;
	return $data;
}

/**
* Set offernumber - Offernumber
* @param string $offernumber
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setOffernumber ($offernumber) {
	$this->offernumber = $offernumber;
	return $this;
}

/**
* Get dateCreated - CreationDate
* @return Zend_Date
*/
public function getDateCreated () {
	$preValue = $this->preGetValue("dateCreated"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->dateCreated;
	return $data;
}

/**
* Set dateCreated - CreationDate
* @param Zend_Date $dateCreated
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setDateCreated ($dateCreated) {
	$this->dateCreated = $dateCreated;
	return $this;
}

/**
* Get dateValidUntil - Valid Until
* @return Pimcore_Date
*/
public function getDateValidUntil () {
	$preValue = $this->preGetValue("dateValidUntil"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->dateValidUntil;
	return $data;
}

/**
* Set dateValidUntil - Valid Until
* @param Pimcore_Date $dateValidUntil
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setDateValidUntil ($dateValidUntil) {
	$this->dateValidUntil = $dateValidUntil;
	return $this;
}

/**
* Get totalPriceBeforeDiscount - Total Price Before Discount
* @return float
*/
public function getTotalPriceBeforeDiscount () {
	$preValue = $this->preGetValue("totalPriceBeforeDiscount"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->totalPriceBeforeDiscount;
	return $data;
}

/**
* Set totalPriceBeforeDiscount - Total Price Before Discount
* @param float $totalPriceBeforeDiscount
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setTotalPriceBeforeDiscount ($totalPriceBeforeDiscount) {
	$this->totalPriceBeforeDiscount = $totalPriceBeforeDiscount;
	return $this;
}

/**
* Get totalPrice - TotalPrice
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
* Set totalPrice - TotalPrice
* @param float $totalPrice
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setTotalPrice ($totalPrice) {
	$this->totalPrice = $totalPrice;
	return $this;
}

/**
* Get discount - Discount
* @return float
*/
public function getDiscount () {
	$preValue = $this->preGetValue("discount"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->discount;
	return $data;
}

/**
* Set discount - Discount
* @param float $discount
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setDiscount ($discount) {
	$this->discount = $discount;
	return $this;
}

/**
* Get discountType - Discount Type
* @return string
*/
public function getDiscountType () {
	$preValue = $this->preGetValue("discountType"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->discountType;
	return $data;
}

/**
* Set discountType - Discount Type
* @param string $discountType
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setDiscountType ($discountType) {
	$this->discountType = $discountType;
	return $this;
}

/**
* Get items - Items
* @return array
*/
public function getItems () {
	$preValue = $this->preGetValue("items"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("items")->preGetData($this);
	return $data;
}

/**
* Set items - Items
* @param array $items
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setItems ($items) {
	$this->items = $this->getClass()->getFieldDefinition("items")->preSetData($this, $items);
	return $this;
}

/**
* Get customItems - Custom Items
* @return array
*/
public function getCustomItems () {
	$preValue = $this->preGetValue("customItems"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("customItems")->preGetData($this);
	return $data;
}

/**
* Set customItems - Custom Items
* @param array $customItems
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setCustomItems ($customItems) {
	$this->customItems = $this->getClass()->getFieldDefinition("customItems")->preSetData($this, $customItems);
	return $this;
}

/**
* Get cartId - Cart Id
* @return string
*/
public function getCartId () {
	$preValue = $this->preGetValue("cartId"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->cartId;
	return $data;
}

/**
* Set cartId - Cart Id
* @param string $cartId
* @return \Pimcore\Model\Object\OfferToolOffer
*/
public function setCartId ($cartId) {
	$this->cartId = $cartId;
	return $this;
}

protected static $_relationFields = array (
  'items' => 
  array (
    'type' => 'objects',
  ),
  'customItems' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = NULL;

}

