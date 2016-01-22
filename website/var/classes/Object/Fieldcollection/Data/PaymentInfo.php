<?php 

/** Generated at 2015-05-18T15:33:21+02:00 */

/**
* IP:          192.168.9.77
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class PaymentInfo extends \OnlineShop_Framework_AbstractPaymentInformation  {

public $type = "PaymentInfo";
public $paymentStart;
public $paymentFinish;
public $paymentReference;
public $paymentState;
public $internalPaymentId;
public $message;
public $providerData;
public $provider_qpay_amount;
public $provider_qpay_paymentType;
public $provider_qpay_paymentState;
public $provider_datatrans_acqAuthorizationCode;
public $provider_datatrans_amount;
public $provider_datatrans_responseXML;
public $provider_paypal_amount;
public $provider_paypal_TransactionType;
public $provider_paypal_PaymentType;


/**
* Get paymentStart - Payment Start
* @return \Pimcore\Date
*/
public function getPaymentStart () {
	$data = $this->paymentStart;
	 return $data;
}

/**
* Get paymentStart - Payment Start
* @param \Pimcore\Date $paymentStart
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setPaymentStart ($paymentStart) {
	$this->paymentStart = $paymentStart;
	return $this;
}

/**
* Get paymentFinish - Payment Finish
* @return \Pimcore\Date
*/
public function getPaymentFinish () {
	$data = $this->paymentFinish;
	 return $data;
}

/**
* Get paymentFinish - Payment Finish
* @param \Pimcore\Date $paymentFinish
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setPaymentFinish ($paymentFinish) {
	$this->paymentFinish = $paymentFinish;
	return $this;
}

/**
* Get paymentReference - Payment Reference
* @return string
*/
public function getPaymentReference () {
	$data = $this->paymentReference;
	 return $data;
}

/**
* Get paymentReference - Payment Reference
* @param string $paymentReference
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setPaymentReference ($paymentReference) {
	$this->paymentReference = $paymentReference;
	return $this;
}

/**
* Get paymentState - Payment State
* @return string
*/
public function getPaymentState () {
	$data = $this->paymentState;
	 return $data;
}

/**
* Get paymentState - Payment State
* @param string $paymentState
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setPaymentState ($paymentState) {
	$this->paymentState = $paymentState;
	return $this;
}

/**
* Get internalPaymentId - Internal Payment ID
* @return string
*/
public function getInternalPaymentId () {
	$data = $this->internalPaymentId;
	 return $data;
}

/**
* Get internalPaymentId - Internal Payment ID
* @param string $internalPaymentId
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setInternalPaymentId ($internalPaymentId) {
	$this->internalPaymentId = $internalPaymentId;
	return $this;
}

/**
* Get message - Message
* @return string
*/
public function getMessage () {
	$data = $this->message;
	 return $data;
}

/**
* Get message - Message
* @param string $message
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setMessage ($message) {
	$this->message = $message;
	return $this;
}

/**
* Get providerData - Provider Data
* @return string
*/
public function getProviderData () {
	$data = $this->providerData;
	 return $data;
}

/**
* Get providerData - Provider Data
* @param string $providerData
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProviderData ($providerData) {
	$this->providerData = $providerData;
	return $this;
}

/**
* Get provider_qpay_amount - amount
* @return string
*/
public function getProvider_qpay_amount () {
	$data = $this->provider_qpay_amount;
	 return $data;
}

/**
* Get provider_qpay_amount - amount
* @param string $provider_qpay_amount
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_qpay_amount ($provider_qpay_amount) {
	$this->provider_qpay_amount = $provider_qpay_amount;
	return $this;
}

/**
* Get provider_qpay_paymentType - PaymentType
* @return string
*/
public function getProvider_qpay_paymentType () {
	$data = $this->provider_qpay_paymentType;
	 return $data;
}

/**
* Get provider_qpay_paymentType - PaymentType
* @param string $provider_qpay_paymentType
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_qpay_paymentType ($provider_qpay_paymentType) {
	$this->provider_qpay_paymentType = $provider_qpay_paymentType;
	return $this;
}

/**
* Get provider_qpay_paymentState - paymentState
* @return string
*/
public function getProvider_qpay_paymentState () {
	$data = $this->provider_qpay_paymentState;
	 return $data;
}

/**
* Get provider_qpay_paymentState - paymentState
* @param string $provider_qpay_paymentState
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_qpay_paymentState ($provider_qpay_paymentState) {
	$this->provider_qpay_paymentState = $provider_qpay_paymentState;
	return $this;
}

/**
* Get provider_datatrans_acqAuthorizationCode - acqAuthorizationCode
* @return string
*/
public function getProvider_datatrans_acqAuthorizationCode () {
	$data = $this->provider_datatrans_acqAuthorizationCode;
	 return $data;
}

/**
* Get provider_datatrans_acqAuthorizationCode - acqAuthorizationCode
* @param string $provider_datatrans_acqAuthorizationCode
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_datatrans_acqAuthorizationCode ($provider_datatrans_acqAuthorizationCode) {
	$this->provider_datatrans_acqAuthorizationCode = $provider_datatrans_acqAuthorizationCode;
	return $this;
}

/**
* Get provider_datatrans_amount - amount
* @return string
*/
public function getProvider_datatrans_amount () {
	$data = $this->provider_datatrans_amount;
	 return $data;
}

/**
* Get provider_datatrans_amount - amount
* @param string $provider_datatrans_amount
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_datatrans_amount ($provider_datatrans_amount) {
	$this->provider_datatrans_amount = $provider_datatrans_amount;
	return $this;
}

/**
* Get provider_datatrans_responseXML - responseXML
* @return string
*/
public function getProvider_datatrans_responseXML () {
	$data = $this->provider_datatrans_responseXML;
	 return $data;
}

/**
* Get provider_datatrans_responseXML - responseXML
* @param string $provider_datatrans_responseXML
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_datatrans_responseXML ($provider_datatrans_responseXML) {
	$this->provider_datatrans_responseXML = $provider_datatrans_responseXML;
	return $this;
}

/**
* Get provider_paypal_amount - amount
* @return string
*/
public function getProvider_paypal_amount () {
	$data = $this->provider_paypal_amount;
	 return $data;
}

/**
* Get provider_paypal_amount - amount
* @param string $provider_paypal_amount
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_paypal_amount ($provider_paypal_amount) {
	$this->provider_paypal_amount = $provider_paypal_amount;
	return $this;
}

/**
* Get provider_paypal_TransactionType - TransactionType
* @return string
*/
public function getProvider_paypal_TransactionType () {
	$data = $this->provider_paypal_TransactionType;
	 return $data;
}

/**
* Get provider_paypal_TransactionType - TransactionType
* @param string $provider_paypal_TransactionType
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_paypal_TransactionType ($provider_paypal_TransactionType) {
	$this->provider_paypal_TransactionType = $provider_paypal_TransactionType;
	return $this;
}

/**
* Get provider_paypal_PaymentType - PaymentType
* @return string
*/
public function getProvider_paypal_PaymentType () {
	$data = $this->provider_paypal_PaymentType;
	 return $data;
}

/**
* Get provider_paypal_PaymentType - PaymentType
* @param string $provider_paypal_PaymentType
* @return \Pimcore\Model\Object\PaymentInfo
*/
public function setProvider_paypal_PaymentType ($provider_paypal_PaymentType) {
	$this->provider_paypal_PaymentType = $provider_paypal_PaymentType;
	return $this;
}

}

