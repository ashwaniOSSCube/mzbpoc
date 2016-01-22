<?php

//use Website\Controller\Action;

class ContentController extends Website_Controller_Action {

	public function portalAction () {
		//$this->enableLayout();
	}
	
	public function landingAction () {
		$this->enableLayout();
		$mzbBrand = Object\Brand::getById($this->_getParam('id'));
		$brandImage = Asset::getById($mzbBrand->brand_image->id);
		$categoriesList = Object_Category::getList(array(
		    "category_brand" => $mzbBrand->id
		));
		$categories = array();
		foreach ($categoriesList as $category) {
			$cat['id'] = $category->getId();
			$cat['category_name'] = $category->category_name;
			$cat['category_description'] = $category->category_desc;
			$cat['category_image'] = Asset::getById($category->category_img->id);
			
			array_push($categories, $cat);
		}
		
		$this->view->brand = $mzbBrand;
		$this->view->brandImage = $brandImage;
		$this->view->categories = $categories;
	}

	public function innerAction () {
		$this->enableLayout();
	}

	public function sidebarAction () {
		//$this->enableLayout();
		$mzbBrand = Object\Brand::getById(11663);
		$categoriesList = Object_Category::getList(array(
		    "category_brand" => $mzbBrand->id
		));
		$categories = array();
		foreach ($categoriesList as $category) {
			$cat['id'] = $category->getId();
			$cat['category_name'] = $category->category_name;
			array_push($categories, $cat);
		}
		$this->view->brand = $mzbBrand;
		$this->view->categories = $categories;
	}

	public function shopdisplayproductsAction () {
		echo "product id : \n";
		die($this->_getParam('id'));
	}
}
