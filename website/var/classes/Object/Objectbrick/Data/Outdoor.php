<?php 

/** Generated at 2015-03-11T21:35:40+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Objectbrick\Data;

use Pimcore\Model\Object;

class Outdoor extends Object\Objectbrick\Data\AbstractData  {

public $type = "outdoor";
public $specs;


/**
* Set specs - 
* @return string
*/
public function getSpecs () {
	$data = $this->specs;
	if(\Pimcore\Model\Object::doGetInheritedValues($this->getObject()) && $this->getDefinition()->getFieldDefinition("specs")->isEmpty($data)) {
		return $this->getValueFromParent("specs");
	}
	 return $data;
}

/**
* Set specs - 
* @param string $specs
* @return \Pimcore\Model\Object\Outdoor
*/
public function setSpecs ($specs) {
	$this->specs = $specs;
	return $this;
}

}

