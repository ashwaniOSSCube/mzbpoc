<?php 

class Object_Unittest extends Object_Concrete {

public $o_classId = 1;
public $o_className = "unittest";
public $keyvaluepairs;
public $date;
public $lazyHref;
public $lazyMultihref;
public $lazyObjects;
public $href;
public $multihref;
public $objects;
public $objectswithmetadata;
public $slider;
public $number;
public $point;
public $bounds;
public $poly;
public $datetime;
public $time;
public $input;
public $password;
public $textarea;
public $wysiwyg;
public $select;
public $multiselect;
public $country;
public $countries;
public $languagex;
public $languages;
public $user;
public $link;
public $image;
public $hotspotimage;
public $checkbox;
public $table;
public $structuredtable;
public $fieldcollection;
public $myfieldcollection;
public $localizedfields;
public $mybricks;


/**
* @param array $values
* @return Object_Unittest
*/
public static function create($values = array()) {
	$object = new self();
	$object->setValues($values);
	return $object;
}

/**
* @return Object_Data_KeyValue
*/
public function getKeyvaluepairs () {
	$preValue = $this->preGetValue("keyvaluepairs"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->keyvaluepairs;
	 return $data;
}

/**
* @param Object_Data_KeyValue $keyvaluepairs
* @return void
*/
public function setKeyvaluepairs ($keyvaluepairs) {
	$this->keyvaluepairs = $keyvaluepairs;
	return $this;
}

/**
* @return Pimcore_Date
*/
public function getDate () {
	$preValue = $this->preGetValue("date"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->date;
	 return $data;
}

/**
* @param Pimcore_Date $date
* @return void
*/
public function setDate ($date) {
	$this->date = $date;
	return $this;
}

/**
* @return Document_Page | Document_Snippet | Document | Asset | Object_Abstract
*/
public function getLazyHref () {
	$preValue = $this->preGetValue("lazyHref"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("lazyHref")->preGetData($this);
	 return $data;
}

/**
* @param Document_Page | Document_Snippet | Document | Asset | Object_Abstract $lazyHref
* @return void
*/
public function setLazyHref ($lazyHref) {
	$this->lazyHref = $this->getClass()->getFieldDefinition("lazyHref")->preSetData($this, $lazyHref);
	return $this;
}

/**
* @return array
*/
public function getLazyMultihref () {
	$preValue = $this->preGetValue("lazyMultihref"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("lazyMultihref")->preGetData($this);
	 return $data;
}

/**
* @param array $lazyMultihref
* @return void
*/
public function setLazyMultihref ($lazyMultihref) {
	$this->lazyMultihref = $this->getClass()->getFieldDefinition("lazyMultihref")->preSetData($this, $lazyMultihref);
	return $this;
}

/**
* @return array
*/
public function getLazyObjects () {
	$preValue = $this->preGetValue("lazyObjects"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("lazyObjects")->preGetData($this);
	 return $data;
}

/**
* @param array $lazyObjects
* @return void
*/
public function setLazyObjects ($lazyObjects) {
	$this->lazyObjects = $this->getClass()->getFieldDefinition("lazyObjects")->preSetData($this, $lazyObjects);
	return $this;
}

/**
* @return Document_Page | Document_Snippet | Document | Asset | Object_Abstract
*/
public function getHref () {
	$preValue = $this->preGetValue("href"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("href")->preGetData($this);
	 return $data;
}

/**
* @param Document_Page | Document_Snippet | Document | Asset | Object_Abstract $href
* @return void
*/
public function setHref ($href) {
	$this->href = $this->getClass()->getFieldDefinition("href")->preSetData($this, $href);
	return $this;
}

/**
* @return array
*/
public function getMultihref () {
	$preValue = $this->preGetValue("multihref"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("multihref")->preGetData($this);
	 return $data;
}

/**
* @param array $multihref
* @return void
*/
public function setMultihref ($multihref) {
	$this->multihref = $this->getClass()->getFieldDefinition("multihref")->preSetData($this, $multihref);
	return $this;
}

/**
* @return array
*/
public function getObjects () {
	$preValue = $this->preGetValue("objects"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("objects")->preGetData($this);
	 return $data;
}

/**
* @param array $objects
* @return void
*/
public function setObjects ($objects) {
	$this->objects = $this->getClass()->getFieldDefinition("objects")->preSetData($this, $objects);
	return $this;
}

/**
* @return Object_Data_ObjectMetadata[]
*/
public function getObjectswithmetadata () {
	$preValue = $this->preGetValue("objectswithmetadata"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("objectswithmetadata")->preGetData($this);
	 return $data;
}

/**
* @param Object_Data_ObjectMetadata[] $objectswithmetadata
* @return void
*/
public function setObjectswithmetadata ($objectswithmetadata) {
	$this->objectswithmetadata = $this->getClass()->getFieldDefinition("objectswithmetadata")->preSetData($this, $objectswithmetadata);
	return $this;
}

/**
* @return float
*/
public function getSlider () {
	$preValue = $this->preGetValue("slider"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->slider;
	 return $data;
}

/**
* @param float $slider
* @return void
*/
public function setSlider ($slider) {
	$this->slider = $slider;
	return $this;
}

/**
* @return float
*/
public function getNumber () {
	$preValue = $this->preGetValue("number"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->number;
	 return $data;
}

/**
* @param float $number
* @return void
*/
public function setNumber ($number) {
	$this->number = $number;
	return $this;
}

/**
* @return Object_Data_Geopoint
*/
public function getPoint () {
	$preValue = $this->preGetValue("point"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->point;
	 return $data;
}

/**
* @param Object_Data_Geopoint $point
* @return void
*/
public function setPoint ($point) {
	$this->point = $point;
	return $this;
}

/**
* @return Object_Data_Geobounds
*/
public function getBounds () {
	$preValue = $this->preGetValue("bounds"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->bounds;
	 return $data;
}

/**
* @param Object_Data_Geobounds $bounds
* @return void
*/
public function setBounds ($bounds) {
	$this->bounds = $bounds;
	return $this;
}

/**
* @return array
*/
public function getPoly () {
	$preValue = $this->preGetValue("poly"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->poly;
	 return $data;
}

/**
* @param array $poly
* @return void
*/
public function setPoly ($poly) {
	$this->poly = $poly;
	return $this;
}

/**
* @return Zend_Date
*/
public function getDatetime () {
	$preValue = $this->preGetValue("datetime"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->datetime;
	 return $data;
}

/**
* @param Zend_Date $datetime
* @return void
*/
public function setDatetime ($datetime) {
	$this->datetime = $datetime;
	return $this;
}

/**
* @return string
*/
public function getTime () {
	$preValue = $this->preGetValue("time"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->time;
	 return $data;
}

/**
* @param string $time
* @return void
*/
public function setTime ($time) {
	$this->time = $time;
	return $this;
}

/**
* @return string
*/
public function getInput () {
	$preValue = $this->preGetValue("input"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->input;
	 return $data;
}

/**
* @param string $input
* @return void
*/
public function setInput ($input) {
	$this->input = $input;
	return $this;
}

/**
* @return string
*/
public function getPassword () {
	$preValue = $this->preGetValue("password"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->password;
	 return $data;
}

/**
* @param string $password
* @return void
*/
public function setPassword ($password) {
	$this->password = $password;
	return $this;
}

/**
* @return string
*/
public function getTextarea () {
	$preValue = $this->preGetValue("textarea"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->textarea;
	 return $data;
}

/**
* @param string $textarea
* @return void
*/
public function setTextarea ($textarea) {
	$this->textarea = $textarea;
	return $this;
}

/**
* @return string
*/
public function getWysiwyg () {
	$preValue = $this->preGetValue("wysiwyg"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("wysiwyg")->preGetData($this);
	 return $data;
}

/**
* @param string $wysiwyg
* @return void
*/
public function setWysiwyg ($wysiwyg) {
	$this->wysiwyg = $wysiwyg;
	return $this;
}

/**
* @return string
*/
public function getSelect () {
	$preValue = $this->preGetValue("select"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->select;
	 return $data;
}

/**
* @param string $select
* @return void
*/
public function setSelect ($select) {
	$this->select = $select;
	return $this;
}

/**
* @return string
*/
public function getMultiselect () {
	$preValue = $this->preGetValue("multiselect"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->multiselect;
	 return $data;
}

/**
* @param string $multiselect
* @return void
*/
public function setMultiselect ($multiselect) {
	$this->multiselect = $multiselect;
	return $this;
}

/**
* @return string
*/
public function getCountry () {
	$preValue = $this->preGetValue("country"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->country;
	 return $data;
}

/**
* @param string $country
* @return void
*/
public function setCountry ($country) {
	$this->country = $country;
	return $this;
}

/**
* @return string
*/
public function getCountries () {
	$preValue = $this->preGetValue("countries"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->countries;
	 return $data;
}

/**
* @param string $countries
* @return void
*/
public function setCountries ($countries) {
	$this->countries = $countries;
	return $this;
}

/**
* @return string
*/
public function getLanguagex () {
	$preValue = $this->preGetValue("languagex"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->languagex;
	 return $data;
}

/**
* @param string $languagex
* @return void
*/
public function setLanguagex ($languagex) {
	$this->languagex = $languagex;
	return $this;
}

/**
* @return string
*/
public function getLanguages () {
	$preValue = $this->preGetValue("languages"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->languages;
	 return $data;
}

/**
* @param string $languages
* @return void
*/
public function setLanguages ($languages) {
	$this->languages = $languages;
	return $this;
}

/**
* @return string
*/
public function getUser () {
	$preValue = $this->preGetValue("user"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->user;
	 return $data;
}

/**
* @param string $user
* @return void
*/
public function setUser ($user) {
	$this->user = $user;
	return $this;
}

/**
* @return Object_Data_Link
*/
public function getLink () {
	$preValue = $this->preGetValue("link"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->link;
	 return $data;
}

/**
* @param Object_Data_Link $link
* @return void
*/
public function setLink ($link) {
	$this->link = $link;
	return $this;
}

/**
* @return Asset_Image
*/
public function getImage () {
	$preValue = $this->preGetValue("image"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->image;
	 return $data;
}

/**
* @param Asset_Image $image
* @return void
*/
public function setImage ($image) {
	$this->image = $image;
	return $this;
}

/**
* @return Object_Data_Hotspotimage
*/
public function getHotspotimage () {
	$preValue = $this->preGetValue("hotspotimage"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->hotspotimage;
	 return $data;
}

/**
* @param Object_Data_Hotspotimage $hotspotimage
* @return void
*/
public function setHotspotimage ($hotspotimage) {
	$this->hotspotimage = $hotspotimage;
	return $this;
}

/**
* @return boolean
*/
public function getCheckbox () {
	$preValue = $this->preGetValue("checkbox"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->checkbox;
	 return $data;
}

/**
* @param boolean $checkbox
* @return void
*/
public function setCheckbox ($checkbox) {
	$this->checkbox = $checkbox;
	return $this;
}

/**
* @return array
*/
public function getTable () {
	$preValue = $this->preGetValue("table"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->table;
	 return $data;
}

/**
* @param array $table
* @return void
*/
public function setTable ($table) {
	$this->table = $table;
	return $this;
}

/**
* @return array
*/
public function getStructuredtable () {
	$preValue = $this->preGetValue("structuredtable"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->structuredtable;
	 return $data;
}

/**
* @param array $structuredtable
* @return void
*/
public function setStructuredtable ($structuredtable) {
	$this->structuredtable = $structuredtable;
	return $this;
}

/**
* @return Object_Fieldcollection
*/
public function getFieldcollection () {
	$preValue = $this->preGetValue("fieldcollection"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("fieldcollection")->preGetData($this);
	 return $data;
}

/**
* @param Object_Fieldcollection $fieldcollection
* @return void
*/
public function setFieldcollection ($fieldcollection) {
	$this->fieldcollection = $this->getClass()->getFieldDefinition("fieldcollection")->preSetData($this, $fieldcollection);
	return $this;
}

/**
* @return Object_Fieldcollection
*/
public function getMyfieldcollection () {
	$preValue = $this->preGetValue("myfieldcollection"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("myfieldcollection")->preGetData($this);
	 return $data;
}

/**
* @param Object_Fieldcollection $myfieldcollection
* @return void
*/
public function setMyfieldcollection ($myfieldcollection) {
	$this->myfieldcollection = $this->getClass()->getFieldDefinition("myfieldcollection")->preSetData($this, $myfieldcollection);
	return $this;
}

/**
* @return array
*/
public function getLocalizedfields () {
	$preValue = $this->preGetValue("localizedfields"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	$data = $this->getClass()->getFieldDefinition("localizedfields")->preGetData($this);
	 return $data;
}

/**
* @return string
*/
public function getLinput ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("linput", $language);
	$preValue = $this->preGetValue("linput"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLtextarea ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("ltextarea", $language);
	$preValue = $this->preGetValue("ltextarea"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLwysiwyg ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lwysiwyg", $language);
	$preValue = $this->preGetValue("lwysiwyg"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return float
*/
public function getLnumber ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lnumber", $language);
	$preValue = $this->preGetValue("lnumber"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return float
*/
public function getLslider ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lslider", $language);
	$preValue = $this->preGetValue("lslider"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return Pimcore_Date
*/
public function getLdate ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("ldate", $language);
	$preValue = $this->preGetValue("ldate"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return Zend_Date
*/
public function getLdatetime ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("ldatetime", $language);
	$preValue = $this->preGetValue("ldatetime"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLtime ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("ltime", $language);
	$preValue = $this->preGetValue("ltime"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLselect ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lselect", $language);
	$preValue = $this->preGetValue("lselect"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLmultiselect ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lmultiselect", $language);
	$preValue = $this->preGetValue("lmultiselect"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLcountries ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lcountries", $language);
	$preValue = $this->preGetValue("lcountries"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return string
*/
public function getLlanguages ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("llanguages", $language);
	$preValue = $this->preGetValue("llanguages"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return array
*/
public function getLtable ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("ltable", $language);
	$preValue = $this->preGetValue("ltable"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return Asset_Image
*/
public function getLimage ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("limage", $language);
	$preValue = $this->preGetValue("limage"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return boolean
*/
public function getLcheckbox ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lcheckbox", $language);
	$preValue = $this->preGetValue("lcheckbox"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return Object_Data_Link
*/
public function getLlink ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("llink", $language);
	$preValue = $this->preGetValue("llink"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @return array
*/
public function getLobjects ($language = null) {
	$data = $this->getLocalizedfields()->getLocalizedValue("lobjects", $language);
	$preValue = $this->preGetValue("lobjects"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @param array $localizedfields
* @return void
*/
public function setLocalizedfields ($localizedfields) {
	$this->localizedfields = $localizedfields;
	return $this;
}

/**
* @param string $linput
* @return void
*/
public function setLinput ($linput, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("linput", $linput, $language);
	return $this;
}

/**
* @param string $ltextarea
* @return void
*/
public function setLtextarea ($ltextarea, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("ltextarea", $ltextarea, $language);
	return $this;
}

/**
* @param string $lwysiwyg
* @return void
*/
public function setLwysiwyg ($lwysiwyg, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lwysiwyg", $lwysiwyg, $language);
	return $this;
}

/**
* @param float $lnumber
* @return void
*/
public function setLnumber ($lnumber, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lnumber", $lnumber, $language);
	return $this;
}

/**
* @param float $lslider
* @return void
*/
public function setLslider ($lslider, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lslider", $lslider, $language);
	return $this;
}

/**
* @param Pimcore_Date $ldate
* @return void
*/
public function setLdate ($ldate, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("ldate", $ldate, $language);
	return $this;
}

/**
* @param Zend_Date $ldatetime
* @return void
*/
public function setLdatetime ($ldatetime, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("ldatetime", $ldatetime, $language);
	return $this;
}

/**
* @param string $ltime
* @return void
*/
public function setLtime ($ltime, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("ltime", $ltime, $language);
	return $this;
}

/**
* @param string $lselect
* @return void
*/
public function setLselect ($lselect, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lselect", $lselect, $language);
	return $this;
}

/**
* @param string $lmultiselect
* @return void
*/
public function setLmultiselect ($lmultiselect, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lmultiselect", $lmultiselect, $language);
	return $this;
}

/**
* @param string $lcountries
* @return void
*/
public function setLcountries ($lcountries, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lcountries", $lcountries, $language);
	return $this;
}

/**
* @param string $llanguages
* @return void
*/
public function setLlanguages ($llanguages, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("llanguages", $llanguages, $language);
	return $this;
}

/**
* @param array $ltable
* @return void
*/
public function setLtable ($ltable, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("ltable", $ltable, $language);
	return $this;
}

/**
* @param Asset_Image $limage
* @return void
*/
public function setLimage ($limage, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("limage", $limage, $language);
	return $this;
}

/**
* @param boolean $lcheckbox
* @return void
*/
public function setLcheckbox ($lcheckbox, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lcheckbox", $lcheckbox, $language);
	return $this;
}

/**
* @param Object_Data_Link $llink
* @return void
*/
public function setLlink ($llink, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("llink", $llink, $language);
	return $this;
}

/**
* @param array $lobjects
* @return void
*/
public function setLobjects ($lobjects, $language = null) {
	$this->getLocalizedfields()->setLocalizedValue("lobjects", $lobjects, $language);
	return $this;
}

/**
* @return Object_Objectbrick
*/
public function getMybricks () {
	$data = $this->mybricks;
	if(!$data) { 
		if(Pimcore_Tool::classExists("Object_Unittest_Mybricks")) { 
			$data = new Object_Unittest_Mybricks($this, "mybricks");
			$this->mybricks = $data;
		} else {
			return null;
		}
	}
	$preValue = $this->preGetValue("mybricks"); 
	if($preValue !== null && !Pimcore::inAdmin()) { return $preValue;}
	 return $data;
}

/**
* @param Object_Objectbrick $mybricks
* @return void
*/
public function setMybricks ($mybricks) {
	$this->mybricks = $this->getClass()->getFieldDefinition("mybricks")->preSetData($this, $mybricks);
	return $this;
}

protected static $_relationFields = array (
  'lazyHref' => 
  array (
    'type' => 'href',
  ),
  'lazyMultihref' => 
  array (
    'type' => 'multihref',
  ),
  'lazyObjects' => 
  array (
    'type' => 'objects',
  ),
  'href' => 
  array (
    'type' => 'href',
  ),
  'multihref' => 
  array (
    'type' => 'multihref',
  ),
  'objects' => 
  array (
    'type' => 'objects',
  ),
  'objectswithmetadata' => 
  array (
    'type' => 'objectsMetadata',
  ),
);

public $lazyLoadedFields = array (
  0 => 'lazyHref',
  1 => 'lazyMultihref',
  2 => 'lazyObjects',
);

}

