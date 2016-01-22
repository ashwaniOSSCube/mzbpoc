<?php



class Rating_AdminController extends Pimcore_Controller_Action_Admin
{

    public function getRatingAction()
    {

        $id = $this->_getParam("id");
        $type = $this->_getParam("type");
        if ($type == "object") {
            $target = Object_Abstract::getById($id);
        } else if ($type == "page" || $type == "snippet") {
            $target = Document::getById($id);
        } else {
            //try asset
            $target = Asset::getById($id);
        }

        if ($target != null) {
            $ratingAmount = Rating_Plugin::getRatingAmountForTarget($target);
            $ratingValue = Rating_Plugin::getRatingValueForTarget($target);
            if ($ratingAmount > 0) {
                $result['success'] = true;
                $average = number_format($ratingValue / $ratingAmount, 2);
                $result['total'] = $ratingAmount;
                $result['average'] = $average;

            }

        }
        echo Zend_Json::encode($result);
        $this->removeViewRenderer();
    }


}


