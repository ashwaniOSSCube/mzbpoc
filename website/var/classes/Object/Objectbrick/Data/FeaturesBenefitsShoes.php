<?php 

/** Generated at 2015-03-11T21:34:54+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Objectbrick\Data;

use Pimcore\Model\Object;

class FeaturesBenefitsShoes extends Object\Objectbrick\Data\AbstractData  {

public $type = "featuresBenefitsShoes";
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
* @return \Pimcore\Model\Object\FeaturesBenefitsShoes
*/
public function setSpecs ($specs) {
	$this->specs = $specs;
	return $this;
}

}

