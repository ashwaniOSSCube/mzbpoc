<?php 

/** Generated at 2015-03-11T21:37:07+01:00 */

/**
* IP:          10.242.2.6
*/


namespace Pimcore\Model\Object\Fieldcollection\Data;

use Pimcore\Model\Object;

class ProductImages extends Object\Fieldcollection\Data\AbstractData  {

public $type = "productImages";
public $image;


/**
* Get image - Image
* @return Asset_Image
*/
public function getImage () {
	$data = $this->image;
	 return $data;
}

/**
* Get image - Image
* @param Asset_Image $image
* @return \Pimcore\Model\Object\ProductImages
*/
public function setImage ($image) {
	$this->image = $image;
	return $this;
}

}

