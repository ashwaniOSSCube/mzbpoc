<?php
/**
 * Created by JetBrains PhpStorm.
 * User: cfasching
 * Date: 31.05.13
 * Time: 15:36
 * To change this template use File | Settings | File Templates.
 */

class PrintController extends Website_Controller_Action {

    public function web2printAction() {
        $this->enableLayout();
    }

    public function productDescriptionAction() {
        $product = Object_Product::getById($this->getParam("id"));

        if ($product instanceof Object_Product) {
            $this->view->product = $product;
            $this->view->showVariantTable = $this->getParam("variants");
        } else {
            echo "ERROR";
            exit;
        }
    }

}