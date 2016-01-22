<?php

class Website_ShopCategory extends Object_ProductCategory {

    public static function getTopLevelCategories() {
        $root = Object_Abstract::getById( 11148 ); //Pimcore_Config::getWebsiteConfig()->shopCategoriesFolder;
        $categories = array();
        foreach($root->getChilds() as $child) {
            if($child instanceof Website_ShopCategory) {
                $categories[] = $child;
            }
        }
        return $categories;
    }

    public function getNavigationPath() {

        $topLevel = $this;
        $categories = array();
        $root = Object_Abstract::getById( 11148 ); //Pimcore_Config::getWebsiteConfig()->shopCategoriesFolder;
        while($topLevel && $topLevel->getId() != $root->getId()) {
            $categories[] = $topLevel;
            $topLevel = $topLevel->getParent();
        }

        $categories = array_reverse($categories);

        $path = '';

        foreach($categories as $category) {
            $path .= Website_Tool_Text::toUrl($category->getName()).'/';
        }

        $path = substr($path, 0, strlen($path)-1);

        return $path;

    }



}