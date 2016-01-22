<?php 

/** Generated at 2015-06-02T15:40:37+02:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          192.168.9.77
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\OnlineShopOrder getByOrdernumber ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByOrderState ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCartId ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByTotalPrice ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByOrderdate ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByItems ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByPriceModifications ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByVoucherTokens ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCurrency ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByComment ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerOrderData ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomer ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerCompany ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerStreet ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerZip ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerCity ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerCountry ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByCustomerEmail ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryCompany ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryStreet ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryZip ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryCity ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByDeliveryCountry ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByPaymentProvider ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByPaymentInfo ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopOrder getByPaymentReference ($value, $limit = 0) 
*/

class OnlineShopOrder extends \OnlineShop_Framework_AbstractOrder {

public $o_classId = 9;
public $o_className = "OnlineShopOrder";
public $ordernumber;
public $orderState;
public $cartId;
public $totalPrice;
public $orderdate;
public $items;
public $priceModifications;
public $voucherTokens;
public $currency;
public $comment;
public $customerOrderData;
public $customer;
public $customerName;
public $customerCompany;
public $customerStreet;
public $customerZip;
public $customerCity;
public $customerCountry;
public $customerEmail;
public $deliveryName;
public $deliveryCompany;
public $deliveryStreet;
public $deliveryZip;
public $deliveryCity;
public $deliveryCountry;
public $paymentProvider;
public $paymentInfo;
public $paymentReference;


/**
* @param array $values
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get ordernumber - Ordernumber
* @return string
*/
public function getOrdernumber () {
	$preValue = $this->preGetValue("ordernumber"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->ordernumber;
	return $data;
}

/**
* Set ordernumber - Ordernumber
* @param string $ordernumber
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setOrdernumber ($ordernumber) {
	$this->ordernumber = $ordernumber;
	return $this;
}

/**
* Get orderState - OrderState
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
* Set orderState - OrderState
* @param string $orderState
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setOrderState ($orderState) {
	$this->orderState = $orderState;
	return $this;
}

/**
* Get cartId - Cart ID
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
* Set cartId - Cart ID
* @param string $cartId
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCartId ($cartId) {
	$this->cartId = $cartId;
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
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setTotalPrice ($totalPrice) {
	$this->totalPrice = $totalPrice;
	return $this;
}

/**
* Get orderdate - Orderdate
* @return \Pimcore\Date
*/
public function getOrderdate () {
	$preValue = $this->preGetValue("orderdate"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->orderdate;
	return $data;
}

/**
* Set orderdate - Orderdate
* @param \Pimcore\Date $orderdate
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setOrderdate ($orderdate) {
	$this->orderdate = $orderdate;
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
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setItems ($items) {
	$this->items = $this->getClass()->getFieldDefinition("items")->preSetData($this, $items);
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getPriceModifications () {
	$preValue = $this->preGetValue("priceModifications"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("priceModifications")->preGetData($this);
	 return $data;
}

/**
* Set priceModifications - PriceModifications
* @param \Pimcore\Model\Object\Fieldcollection $priceModifications
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setPriceModifications ($priceModifications) {
	$this->priceModifications = $this->getClass()->getFieldDefinition("priceModifications")->preSetData($this, $priceModifications);
	return $this;
}

/**
* Get voucherTokens - Voucher Tokens
* @return array
*/
public function getVoucherTokens () {
	$preValue = $this->preGetValue("voucherTokens"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("voucherTokens")->preGetData($this);
	return $data;
}

/**
* Set voucherTokens - Voucher Tokens
* @param array $voucherTokens
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setVoucherTokens ($voucherTokens) {
	$this->voucherTokens = $this->getClass()->getFieldDefinition("voucherTokens")->preSetData($this, $voucherTokens);
	return $this;
}

/**
* Get currency - Currency
* @return string
*/
public function getCurrency () {
	$preValue = $this->preGetValue("currency"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->currency;
	return $data;
}

/**
* Set currency - Currency
* @param string $currency
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCurrency ($currency) {
	$this->currency = $currency;
	return $this;
}

/**
* Get comment - Comment
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
* Set comment - Comment
* @param string $comment
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setComment ($comment) {
	$this->comment = $comment;
	return $this;
}

/**
* Get customerOrderData - Customer Order Data
* @return string
*/
public function getCustomerOrderData () {
	$preValue = $this->preGetValue("customerOrderData"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerOrderData;
	return $data;
}

/**
* Set customerOrderData - Customer Order Data
* @param string $customerOrderData
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerOrderData ($customerOrderData) {
	$this->customerOrderData = $customerOrderData;
	return $this;
}

/**
* Get customer - Customer
* @return \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject
*/
public function getCustomer () {
	$preValue = $this->preGetValue("customer"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("customer")->preGetData($this);
	return $data;
}

/**
* Set customer - Customer
* @param \Pimcore\Model\Document\Page | \Pimcore\Model\Document\Snippet | \Pimcore\Model\Document | \Pimcore\Model\Asset | \Pimcore\Model\Object\AbstractObject $customer
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomer ($customer) {
	$this->customer = $this->getClass()->getFieldDefinition("customer")->preSetData($this, $customer);
	return $this;
}

/**
* Get customerName - Name
* @return string
*/
public function getCustomerName () {
	$preValue = $this->preGetValue("customerName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerName;
	return $data;
}

/**
* Set customerName - Name
* @param string $customerName
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerName ($customerName) {
	$this->customerName = $customerName;
	return $this;
}

/**
* Get customerCompany - Company
* @return string
*/
public function getCustomerCompany () {
	$preValue = $this->preGetValue("customerCompany"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerCompany;
	return $data;
}

/**
* Set customerCompany - Company
* @param string $customerCompany
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerCompany ($customerCompany) {
	$this->customerCompany = $customerCompany;
	return $this;
}

/**
* Get customerStreet - Street
* @return string
*/
public function getCustomerStreet () {
	$preValue = $this->preGetValue("customerStreet"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerStreet;
	return $data;
}

/**
* Set customerStreet - Street
* @param string $customerStreet
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerStreet ($customerStreet) {
	$this->customerStreet = $customerStreet;
	return $this;
}

/**
* Get customerZip - Zip
* @return string
*/
public function getCustomerZip () {
	$preValue = $this->preGetValue("customerZip"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerZip;
	return $data;
}

/**
* Set customerZip - Zip
* @param string $customerZip
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerZip ($customerZip) {
	$this->customerZip = $customerZip;
	return $this;
}

/**
* Get customerCity - City
* @return string
*/
public function getCustomerCity () {
	$preValue = $this->preGetValue("customerCity"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerCity;
	return $data;
}

/**
* Set customerCity - City
* @param string $customerCity
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerCity ($customerCity) {
	$this->customerCity = $customerCity;
	return $this;
}

/**
* Get customerCountry - Country
* @return string
*/
public function getCustomerCountry () {
	$preValue = $this->preGetValue("customerCountry"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerCountry;
	return $data;
}

/**
* Set customerCountry - Country
* @param string $customerCountry
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerCountry ($customerCountry) {
	$this->customerCountry = $customerCountry;
	return $this;
}

/**
* Get customerEmail - Email
* @return string
*/
public function getCustomerEmail () {
	$preValue = $this->preGetValue("customerEmail"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->customerEmail;
	return $data;
}

/**
* Set customerEmail - Email
* @param string $customerEmail
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setCustomerEmail ($customerEmail) {
	$this->customerEmail = $customerEmail;
	return $this;
}

/**
* Get deliveryName - Name
* @return string
*/
public function getDeliveryName () {
	$preValue = $this->preGetValue("deliveryName"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryName;
	return $data;
}

/**
* Set deliveryName - Name
* @param string $deliveryName
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryName ($deliveryName) {
	$this->deliveryName = $deliveryName;
	return $this;
}

/**
* Get deliveryCompany - Company
* @return string
*/
public function getDeliveryCompany () {
	$preValue = $this->preGetValue("deliveryCompany"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryCompany;
	return $data;
}

/**
* Set deliveryCompany - Company
* @param string $deliveryCompany
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryCompany ($deliveryCompany) {
	$this->deliveryCompany = $deliveryCompany;
	return $this;
}

/**
* Get deliveryStreet - Street
* @return string
*/
public function getDeliveryStreet () {
	$preValue = $this->preGetValue("deliveryStreet"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryStreet;
	return $data;
}

/**
* Set deliveryStreet - Street
* @param string $deliveryStreet
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryStreet ($deliveryStreet) {
	$this->deliveryStreet = $deliveryStreet;
	return $this;
}

/**
* Get deliveryZip - Zip
* @return string
*/
public function getDeliveryZip () {
	$preValue = $this->preGetValue("deliveryZip"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryZip;
	return $data;
}

/**
* Set deliveryZip - Zip
* @param string $deliveryZip
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryZip ($deliveryZip) {
	$this->deliveryZip = $deliveryZip;
	return $this;
}

/**
* Get deliveryCity - City
* @return string
*/
public function getDeliveryCity () {
	$preValue = $this->preGetValue("deliveryCity"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryCity;
	return $data;
}

/**
* Set deliveryCity - City
* @param string $deliveryCity
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryCity ($deliveryCity) {
	$this->deliveryCity = $deliveryCity;
	return $this;
}

/**
* Get deliveryCountry - Country
* @return string
*/
public function getDeliveryCountry () {
	$preValue = $this->preGetValue("deliveryCountry"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->deliveryCountry;
	return $data;
}

/**
* Set deliveryCountry - Country
* @param string $deliveryCountry
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setDeliveryCountry ($deliveryCountry) {
	$this->deliveryCountry = $deliveryCountry;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Objectbrick
*/
public function getPaymentProvider () {
	$data = $this->paymentProvider;
	if(!$data) { 
		if(\Pimcore\Tool::classExists("\Pimcore\Model\Object\OnlineShopOrder\PaymentProvider")) { 
			$data = new \Pimcore\Model\Object\OnlineShopOrder\PaymentProvider($this, "paymentProvider");
			$this->paymentProvider = $data;
		} else {
			return null;
		}
	}
	$preValue = $this->preGetValue("paymentProvider"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* Set paymentProvider - Payment Provider
* @param \Pimcore\Model\Object\Objectbrick $paymentProvider
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setPaymentProvider ($paymentProvider) {
	$this->paymentProvider = $this->getClass()->getFieldDefinition("paymentProvider")->preSetData($this, $paymentProvider);
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getPaymentInfo () {
	$preValue = $this->preGetValue("paymentInfo"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("paymentInfo")->preGetData($this);
	 return $data;
}

/**
* Set paymentInfo - Payment Informations
* @param \Pimcore\Model\Object\Fieldcollection $paymentInfo
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setPaymentInfo ($paymentInfo) {
	$this->paymentInfo = $this->getClass()->getFieldDefinition("paymentInfo")->preSetData($this, $paymentInfo);
	return $this;
}

/**
* Get paymentReference - Payment Ref.
* @return string
*/
public function getPaymentReference () {
	$preValue = $this->preGetValue("paymentReference"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->paymentReference;
	return $data;
}

/**
* Set paymentReference - Payment Ref.
* @param string $paymentReference
* @return \Pimcore\Model\Object\OnlineShopOrder
*/
public function setPaymentReference ($paymentReference) {
	$this->paymentReference = $paymentReference;
	return $this;
}

protected static $_relationFields = array (
  'items' => 
  array (
    'type' => 'objects',
  ),
  'voucherTokens' => 
  array (
    'type' => 'objects',
  ),
  'customer' => 
  array (
    'type' => 'href',
  ),
);

public $lazyLoadedFields = NULL;

}

