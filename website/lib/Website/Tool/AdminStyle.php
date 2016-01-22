<?php
class Website_Tool_AdminStyle extends Element_AdminStyle {

    public function __construct($element) {
        parent::__construct($element);

        if($element instanceof Object_Product) {
            $backup = Object_Abstract::doGetInheritedValues($element);
            Object_Abstract::setGetInheritedValues(true);
            if($element->getParent() instanceof Object_Product) {
                $this->elementIcon = '/pimcore/static/img/icon/tag_green.png';
                $this->elementIconClass = null;
            } else {
                $this->elementIcon = '/pimcore/static/img/icon/tag_blue.png';
                $this->elementIconClass = null;
            }
            Object_Abstract::setGetInheritedValues($backup);
        }
    }

}