<?php 

/** Generated at 2015-03-11T21:33:47+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class Address extends Concrete {

public $o_classId = 28;
public $o_className = "Address";
public $label;
public $firstname;
public $lastname;
public $company;
public $address;
public $zip;
public $city;
public $country;


/**
* @param array $values
* @return \Pimcore\Model\Object\Address
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get label - Label
* @return string
*/
public function getLabel () {
	$preValue = $this->preGetValue("label"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->label;
	return $data;
}

/**
* Set label - Label
* @param string $label
* @return \Pimcore\Model\Object\Address
*/
public function setLabel ($label) {
	$this->label = $label;
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
* @return \Pimcore\Model\Object\Address
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
* @return \Pimcore\Model\Object\Address
*/
public function setLastname ($lastname) {
	$this->lastname = $lastname;
	return $this;
}

/**
* Get company - Company
* @return string
*/
public function getCompany () {
	$preValue = $this->preGetValue("company"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->company;
	return $data;
}

/**
* Set company - Company
* @param string $company
* @return \Pimcore\Model\Object\Address
*/
public function setCompany ($company) {
	$this->company = $company;
	return $this;
}

/**
* Get address - Address
* @return string
*/
public function getAddress () {
	$preValue = $this->preGetValue("address"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->address;
	return $data;
}

/**
* Set address - Address
* @param string $address
* @return \Pimcore\Model\Object\Address
*/
public function setAddress ($address) {
	$this->address = $address;
	return $this;
}

/**
* Get zip - Zip
* @return string
*/
public function getZip () {
	$preValue = $this->preGetValue("zip"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->zip;
	return $data;
}

/**
* Set zip - Zip
* @param string $zip
* @return \Pimcore\Model\Object\Address
*/
public function setZip ($zip) {
	$this->zip = $zip;
	return $this;
}

/**
* Get city - City
* @return string
*/
public function getCity () {
	$preValue = $this->preGetValue("city"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->city;
	return $data;
}

/**
* Set city - City
* @param string $city
* @return \Pimcore\Model\Object\Address
*/
public function setCity ($city) {
	$this->city = $city;
	return $this;
}

/**
* Get country - Country
* @return string
*/
public function getCountry () {
	$preValue = $this->preGetValue("country"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->country;
	return $data;
}

/**
* Set country - Country
* @param string $country
* @return \Pimcore\Model\Object\Address
*/
public function setCountry ($country) {
	$this->country = $country;
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

