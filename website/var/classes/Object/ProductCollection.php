<?php 

/** Generated at 2015-03-11T21:34:08+01:00 */

/**
* Inheritance: no
* Variants   : no
* Changed by : admin (2)
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object;



class ProductCollection extends Concrete {

public $o_classId = 15;
public $o_className = "ProductCollection";
public $localizedfields;


/**
* @param array $values
* @return \Pimcore\Model\Object\ProductCollection
*/
public static function create($values = array()) {
	$object = new static();
	$object->setValues($values);
	return $object;
}

/**
* Get localizedfields - 
* @return array
*/
public function getLocalizedfields () {
	$preValue = $this->preGetValue("localizedfields"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { 
		return $preValue;
	}
	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);
	return $data;
}

/**
* Get name - Name
* @return string
*/
public function getName ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("name", $language);
	$preValue = $this->preGetValue("name"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* Get description - Description
* @return string
*/
public function getDescription ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("description", $language);
	$preValue = $this->preGetValue("description"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* Get icon - Icon
* @return Asset_Image
*/
public function getIcon ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("icon", $language);
	$preValue = $this->preGetValue("icon"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* Get usage - Type (usage)
* @return string
*/
public function getUsage ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("usage", $language);
	$preValue = $this->preGetValue("usage"); 
	if($preValue !== null && !\Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* Set localizedfields - 
* @param array $localizedfields
* @return \Pimcore\Model\Object\ProductCollection
*/
public function setLocalizedfields ($localizedfields) {
	$this->localizedfields = $localizedfields;
	return $this;
}

/**
* Set name - Name
* @param string $name
* @return \Pimcore\Model\Object\ProductCollection
*/
public function setName ($name, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("name", $name, $language);
	return $this;
}

/**
* Set description - Description
* @param string $description
* @return \Pimcore\Model\Object\ProductCollection
*/
public function setDescription ($description, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("description", $description, $language);
	return $this;
}

/**
* Set icon - Icon
* @param Asset_Image $icon
* @return \Pimcore\Model\Object\ProductCollection
*/
public function setIcon ($icon, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("icon", $icon, $language);
	return $this;
}

/**
* Set usage - Type (usage)
* @param string $usage
* @return \Pimcore\Model\Object\ProductCollection
*/
public function setUsage ($usage, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("usage", $usage, $language);
	return $this;
}

protected static $_relationFields = array (
);

public $lazyLoadedFields = NULL;

}

