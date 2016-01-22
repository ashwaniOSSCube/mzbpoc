<?php 

/** Generated at 2015-04-30T13:21:38+02:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          192.168.9.79
*/


namespace Pimcore\Model\Object;



/**
* @method static \Pimcore\Model\Object\OnlineShopVoucherSeries getByName ($value, $limit = 0) 
* @method static \Pimcore\Model\Object\OnlineShopVoucherSeries getByTokenSettings ($value, $limit = 0) 
*/

class OnlineShopVoucherSeries extends \OnlineShop_Framework_AbstractVoucherSeries {

public $o_classId = 33;
public $o_className = "OnlineShopVoucherSeries";
public $name;
public $tokenSettings;


/**
* @param array $values
* @return \Pimcore\Model\Object\OnlineShopVoucherSeries
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
* @return \Pimcore\Model\Object\OnlineShopVoucherSeries
*/
public function setName ($name) {
	$this->name = $name;
	return $this;
}

/**
* @return \Pimcore\Model\Object\Fieldcollection
*/
public function getTokenSettings () {
	$preValue = $this->preGetValue("tokenSettings"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("tokenSettings")->preGetData($this);
	 return $data;
}

/**
* Set tokenSettings - Token Settings
* @param \Pimcore\Model\Object\Fieldcollection $tokenSettings
* @return \Pimcore\Model\Object\OnlineShopVoucherSeries
*/
public function setTokenSettings ($tokenSettings) {
	$this->tokenSettings = $this->getClass()->getFieldDefinition("tokenSettings")->preSetData($this, $tokenSettings);
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

