<?php 

/** Generated at 2015-05-26T18:33:12+02:00 */

/**
* IP:          192.168.9.79
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class VoucherTokenTypePattern extends \OnlineShop_Framework_AbstractVoucherTokenType  {

public $type = "VoucherTokenTypePattern";
public $count;
public $prefix;
public $length;
public $characterType;
public $separator;
public $separatorCount;
public $allowOncePerCart;
public $onlyTokenPerCart;


/**
* Get count - Token Count
* @return float
*/
public function getCount () {
	$data = $this->count;
	 return $data;
}

/**
* Get count - Token Count
* @param float $count
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setCount ($count) {
	$this->count = $count;
	return $this;
}

/**
* Get prefix - Prefix
* @return string
*/
public function getPrefix () {
	$data = $this->prefix;
	 return $data;
}

/**
* Get prefix - Prefix
* @param string $prefix
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setPrefix ($prefix) {
	$this->prefix = $prefix;
	return $this;
}

/**
* Get length - Length
* @return float
*/
public function getLength () {
	$data = $this->length;
	 return $data;
}

/**
* Get length - Length
* @param float $length
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setLength ($length) {
	$this->length = $length;
	return $this;
}

/**
* Get characterType - Character Type
* @return string
*/
public function getCharacterType () {
	$data = $this->characterType;
	 return $data;
}

/**
* Get characterType - Character Type
* @param string $characterType
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setCharacterType ($characterType) {
	$this->characterType = $characterType;
	return $this;
}

/**
* Get separator - Separator
* @return string
*/
public function getSeparator () {
	$data = $this->separator;
	 return $data;
}

/**
* Get separator - Separator
* @param string $separator
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setSeparator ($separator) {
	$this->separator = $separator;
	return $this;
}

/**
* Get separatorCount - Every x character 
* @return float
*/
public function getSeparatorCount () {
	$data = $this->separatorCount;
	 return $data;
}

/**
* Get separatorCount - Every x character 
* @param float $separatorCount
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setSeparatorCount ($separatorCount) {
	$this->separatorCount = $separatorCount;
	return $this;
}

/**
* Get allowOncePerCart - Only allow one token of this type per cart
* @return boolean
*/
public function getAllowOncePerCart () {
	$data = $this->allowOncePerCart;
	 return $data;
}

/**
* Get allowOncePerCart - Only allow one token of this type per cart
* @param boolean $allowOncePerCart
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setAllowOncePerCart ($allowOncePerCart) {
	$this->allowOncePerCart = $allowOncePerCart;
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
* @return \Pimcore\Model\Object\VoucherTokenTypePattern
*/
public function setOnlyTokenPerCart ($onlyTokenPerCart) {
	$this->onlyTokenPerCart = $onlyTokenPerCart;
	return $this;
}

}

