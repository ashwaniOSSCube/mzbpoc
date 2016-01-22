<?php 

/** Generated at 2015-05-27T11:29:20+02:00 */

/**
* IP:          192.168.9.79
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class VoucherTokenTypeSingle extends \OnlineShop_Framework_AbstractVoucherTokenType  {

public $type = "VoucherTokenTypeSingle";
public $token;
public $usages;
public $onlyTokenPerCart;


/**
* Get token - Token
* @return string
*/
public function getToken () {
	$data = $this->token;
	 return $data;
}

/**
* Get token - Token
* @param string $token
* @return \Pimcore\Model\Object\VoucherTokenTypeSingle
*/
public function setToken ($token) {
	$this->token = $token;
	return $this;
}

/**
* Get usages - Usage count
* @return float
*/
public function getUsages () {
	$data = $this->usages;
	 return $data;
}

/**
* Get usages - Usage count
* @param float $usages
* @return \Pimcore\Model\Object\VoucherTokenTypeSingle
*/
public function setUsages ($usages) {
	$this->usages = $usages;
	return $this;
}

/**
* Get onlyTokenPerCart - Only token of a cart
* @return boolean
*/
public function getOnlyTokenPerCart () {
	$data = $this->onlyTokenPerCart;
	 return $data;
}

/**
* Get onlyTokenPerCart - Only token of a cart
* @param boolean $onlyTokenPerCart
* @return \Pimcore\Model\Object\VoucherTokenTypeSingle
*/
public function setOnlyTokenPerCart ($onlyTokenPerCart) {
	$this->onlyTokenPerCart = $onlyTokenPerCart;
	return $this;
}

}

