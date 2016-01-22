<?php
/**
 * Created by PhpStorm.
 * User: cfasching
 * Date: 17.03.2015
 * Time: 15:30
 */

trait Website_Product_Traits_Checkoutable {

    public function getOSName() {
        return $this->getName();
    }

    public function getOSPrice($quantityScale = 1) {
        return $this->getOSPriceInfo($quantityScale)->getPrice();
    }

    public function getPriceSystemName() {
        return 'default';
    }

    public function getPriceSystemImplementation() {
        return OnlineShop_Framework_Factory::getInstance()->getPriceSystem($this->getPriceSystemName());
    }

    public function getOSPriceInfo($quantityScale = 1, $forceListPrice = false) {
        return $this->getPriceSystemImplementation()->getPriceInfo($this,$quantityScale, null, $forceListPrice);
    }

    public function getOSProductNumber() {
        return $this->getId();
    }

    public function getAvailabilitySystemName()
    {
        return "default";
    }

    public function getOSIsBookable($quantityScale = 1)
    {
        $price = $this->getOSPrice($quantityScale);
        return !empty($price) && $this->isActive();
    }


    public function getAvailabilitySystemImplementation()
    {
        return OnlineShop_Framework_Factory::getInstance()->getAvailabilitySystem($this->getAvailabilitySystemName());
    }

    /**
     * returns availability info based on given quantity
     *
     * @param int $quantity
     * @return OnlineShop_Framework_IAvailability
     */
    public function getOSAvailabilityInfo($quantity = null)
    {
        return $this->getAvailabilitySystemImplementation()->getAvailabilityInfo($this, $quantity);
    }


    public function getShopDetailLink($view, $canonical = false) {
        $params = is_array($view->params) ? $view->params : $view->getAllParams();
        unset($params['controller']);
        unset($params['action']);
        unset($params['module']);
        unset($params['document']);
        unset($params['pimcore_request_source']);
        unset($params['ajax-call']);
        unset($params['infinite-scroll']);
        unset($params['view']);
        unset($params['cartId']);

        if($canonical) {
            unset($params['category']);
        }

        $params = array_merge((array)$params, array('name'=>strtolower(Website_Tool_Text::toUrl($this->getName() ? $this->getName() : $this->getDesc1())),'product' => $this->getId()));
        if(!$params['country']) {
            $params['country'] = $view->document->getProperty("country");
        }

        $urlCategory = $this->getFirstCategory();

        if($urlCategory) {
            $params['name'] = $urlCategory->getNavigationPath().'/'.$params['name'];
        }


        $params['country'] = str_replace('/','',$params['country']);

        return $view->url($params, "shop-detail");
    }



    /**
     * @param string $thumbnail thumbnail name configured in the Pimcore admin
     * @return string|null
     */
    public function getFirstImage($thumbnail) {
        $firstImageAsset = $this->getFirstImageAsset();
        if($firstImageAsset) {
            return $firstImageAsset->getThumbnail($thumbnail);
        }
        return null;
    }

}