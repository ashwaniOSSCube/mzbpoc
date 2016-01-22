<?php 

/** Generated at 2015-03-11T21:33:48+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class Customer extends Concrete {

public $o_classId = 29;
public $o_className = "Customer";
public $email;
public $Password;
public $firstname;
public $lastname;
public $gender;
public $newsletterActive;
public $newsletterConfirmed;
public $DeliveryAddress;


/**
* @param array $values
* @return \Pimcore\Model\Object\Customer
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get email - Email
* @return string
*/
public function getEmail () {
	$preValue = $this->preGetValue("email"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->email;
	return $data;
}

/**
* Set email - Email
* @param string $email
* @return \Pimcore\Model\Object\Customer
*/
public function setEmail ($email) {
	$this->email = $email;
	return $this;
}

/**
* Get Password - Password
* @return string
*/
public function getPassword () {
	$preValue = $this->preGetValue("Password"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->Password;
	return $data;
}

/**
* Set Password - Password
* @param string $Password
* @return \Pimcore\Model\Object\Customer
*/
public function setPassword ($Password) {
	$this->Password = $Password;
	return $this;
}

/**
* Get firstname - Firstname
* @return string
*/
public function getFirstname () {
	$preValue = $this->preGetValue("firstname"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->firstname;
	return $data;
}

/**
* Set firstname - Firstname
* @param string $firstname
* @return \Pimcore\Model\Object\Customer
*/
public function setFirstname ($firstname) {
	$this->firstname = $firstname;
	return $this;
}

/**
* Get lastname - Lastname
* @return string
*/
public function getLastname () {
	$preValue = $this->preGetValue("lastname"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->lastname;
	return $data;
}

/**
* Set lastname - Lastname
* @param string $lastname
* @return \Pimcore\Model\Object\Customer
*/
public function setLastname ($lastname) {
	$this->lastname = $lastname;
	return $this;
}

/**
* Get gender - Gender
* @return string
*/
public function getGender () {
	$preValue = $this->preGetValue("gender"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->gender;
	return $data;
}

/**
* Set gender - Gender
* @param string $gender
* @return \Pimcore\Model\Object\Customer
*/
public function setGender ($gender) {
	$this->gender = $gender;
	return $this;
}

/**
* Get newsletterActive - Newsletter Active
* @return boolean
*/
public function getNewsletterActive () {
	$preValue = $this->preGetValue("newsletterActive"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->newsletterActive;
	return $data;
}

/**
* Set newsletterActive - Newsletter Active
* @param boolean $newsletterActive
* @return \Pimcore\Model\Object\Customer
*/
public function setNewsletterActive ($newsletterActive) {
	$this->newsletterActive = $newsletterActive;
	return $this;
}

/**
* Get newsletterConfirmed - Newsletter Confirmed
* @return boolean
*/
public function getNewsletterConfirmed () {
	$preValue = $this->preGetValue("newsletterConfirmed"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->newsletterConfirmed;
	return $data;
}

/**
* Set newsletterConfirmed - Newsletter Confirmed
* @param boolean $newsletterConfirmed
* @return \Pimcore\Model\Object\Customer
*/
public function setNewsletterConfirmed ($newsletterConfirmed) {
	$this->newsletterConfirmed = $newsletterConfirmed;
	return $this;
}

/**
* Get DeliveryAddress - Address
* @return array
*/
public function getDeliveryAddress () {
	$preValue = $this->preGetValue("DeliveryAddress"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("DeliveryAddress")->preGetData($this);
	return $data;
}

/**
* Set DeliveryAddress - Address
* @param array $DeliveryAddress
* @return \Pimcore\Model\Object\Customer
*/
public function setDeliveryAddress ($DeliveryAddress) {
	$this->DeliveryAddress = $this->getClass()->getFieldDefinition("DeliveryAddress")->preSetData($this, $DeliveryAddress);
	return $this;
}

protected static $_relationFields = array (
  'DeliveryAddress' => 
  array (
    'type' => 'objects',
  ),
);

public $lazyLoadedFields = NULL;

}

