<?php

/** Zend_View_Helper_Placeholder_Container_Standalone */
require_once 'Zend/View/Helper/Placeholder/Container/Standalone.php';

class Website_View_Helper_ElementsHeadTitle extends Zend_View_Helper_Placeholder_Container_Standalone
{


    public function elementsHeadTitle()
    {
        $crop = false;
        $this->view->set_metatitle = true;

        // add title (Docuemnt Title)
        if ($this->view->document instanceof Document) {
            if ($this->view->document->getTitle()) {
                $this->view->headTitle($this->view->document->getTitle());
                $this->view->set_metatitle = false;
            }
        }


        if ($this->view->getProperty('seo_suffix')) {
            $l = strlen($this->view->input("headline")) + strlen($this->view->input("headline"));
            if ($l > 59) {
                $crop = 60;
            }
        }
        else {
            $l = strlen($this->view->input("headline")) + strlen($this->view->translate("seo_title"));
            if ($l > 59) {
                $crop = 60;
            }
        }

        // for default content-pages
        if ($this->view->set_metatitle) {
            if ($this->view->input("headline")) {
                if ($crop) {
                    $this->view->headTitle($this->getSmartTitle($this->view->input("headline", array("htmlspecialchars" => false)), $crop));
                }
                else {
                    $this->view->headTitle($this->view->input("headline", array("htmlspecialchars" => false)));
                }
                if (!$this->view->getProperty('seo_title_suffix_disable')) {
                    $this->view->headTitle()->setSeparator(' ' . $this->view->getProperty('seo_separator') . ' ');
                    if ($this->view->getProperty('seo_suffix')) {
                        if (!$crop) {
                            $this->view->headTitle($this->view->getProperty('seo_suffix'));
                        }
                    }
                    else {
                        if (!$crop) {
                            $this->view->headTitle($this->view->translate("seo_title"));
                        }
                    }
                }
            }
        }


        if (!$this->view->metaTitleSet) {


            // override title in object detail view
            if ($this->view->placeholder('object_seotitle') != "") {
                $this->view->headTitle($this->view->placeholder('object_seotitle'), 'SET');
            }

            if ($this->view->getProperty('seo_title_characters_length')) {
                $this->view->headTitle($this->getSmartTitle($this->view->headTitle(), $this->view->getProperty('seo_title_characters_length')), 'SET');
            }

            $this->view->metaTitleSet = true; //set to true to avoid duplicate meta titles in case elementsHeadMeta() is called twice
        }

        return $this;
    }

    private function getSmartTitle($headTitle, $length)
    {
        $smarttitle = strip_tags(htmlspecialchars_decode($headTitle));
        return $this->cutStringRespectingWhitespace($smarttitle, $length);
    }

    private function cutStringRespectingWhitespace($string, $length)
    {
        if ($length < strlen($string)) {
            $text = substr($string, 0, $length);
            if (false !== ($length = strrpos($text, ' '))) {
                $text = substr($text, 0, $length);
            }
            $string = $text;
        }
        return $string;
    }

    public function toString()
    {
        return (string)$this->view->headTitle();
    }
}
