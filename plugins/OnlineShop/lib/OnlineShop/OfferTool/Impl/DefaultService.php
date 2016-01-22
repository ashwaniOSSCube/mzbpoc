<?php
/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


class OnlineShop_OfferTool_Impl_DefaultService implements OnlineShop_OfferTool_IService {

    public function __construct($offerClass, $offerItemClass, $parentFolderPath) {

        $this->offerClass = $offerClass;
        $this->offerItemClass = $offerItemClass;
        $this->parentFolderPath = strftime($parentFolderPath, time());
        \Pimcore\Model\Object\Service::createFolderByPath($this->parentFolderPath);

    }

    /**
     * @param OnlineShop_Framework_ICart $cart
     * @param OnlineShop_Framework_ICartItem[] $excludeItems
     * @return OnlineShop_OfferTool_AbstractOffer
     */
    public function createNewOfferFromCart(OnlineShop_Framework_ICart $cart, array $excludeItems = array()) {
        $tempOfferNumber = uniqid("offer_");
        $offer = $this->getNewOfferObject($tempOfferNumber);
        $offer->setOfferNumber($tempOfferNumber);
        $offer->setTotalPrice($cart->getPriceCalculator()->getGrandTotal()->getAmount());
        $offer->setCartId($cart->getId());
        $offer->save();

        $excludedItemKeys = $this->getExcludedItemKeys($excludeItems);

        $offerItems = array();
        $i = 0;
        foreach($cart->getItems() as $item) {
            $i++;

            if(!$excludedItemKeys[$item->getItemKey()]) {

                $offerItem = $this->createOfferItem($item, $offer);
                $offerItem->save();

                $offerItems[] = $offerItem;
            }

        }

        $offer->setItems($offerItems);
        $offer->save();

        return $offer;
    }

    protected function getExcludedItemKeys($excludeItems) {
        $excludedItemKeys = array();
        if($excludeItems) {
            foreach($excludeItems as $item) {
                $excludedItemKeys[$item->getItemKey()] = $item->getItemKey();
            }
        }
        return $excludedItemKeys;
    }

    /**
     * @return OnlineShop_OfferTool_AbstractOffer
     * @throws Exception
     */
    protected function getNewOfferObject($tempOfferNumber) {
        if(!class_exists($this->offerClass)) {
            throw new Exception("Offer Class" . $this->offerClass . " does not exist.");
        }
        $offer = new $this->offerClass();

        /**
         * @var $offer OnlineShop_OfferTool_AbstractOffer
         */
        $offer->setParent(\Pimcore\Model\Object\Folder::getByPath($this->parentFolderPath));
        $offer->setCreationDate(Zend_Date::now()->get());
        $offer->setKey($tempOfferNumber);
        $offer->setPublished(true);
        $offer->setDateCreated(Zend_Date::now());

        return $offer;
    }

    /**
     * @return OnlineShop_OfferTool_AbstractOfferItem
     * @throws Exception
     */
    public function getNewOfferItemObject() {
        if(!class_exists($this->offerItemClass)) {
            throw new Exception("OfferItem Class" . $this->offerItemClass . " does not exist.");
        }
        return new $this->offerItemClass();
    }

    /**
     * @param OnlineShop_Framework_ICartItem $item
     * @param $parent
     * @return OnlineShop_OfferTool_AbstractOfferItem
     */
    protected function createOfferItem(OnlineShop_Framework_ICartItem $item, $parent) {
        $offerItem = $this->getNewOfferItemObject();
        $offerItem->setParent($parent);
        $offerItem->setPublished(true);
        $offerItem->setCartItemKey($item->getItemKey());
        $offerItem->setKey($item->getProduct()->getId() . "_" . $item->getItemKey());

        $offerItem->setAmount($item->getCount());
        $offerItem->setProduct($item->getProduct());
        if($item->getProduct()) {
            $offerItem->setProductName($item->getProduct()->getOSName());
            $offerItem->setProductNumber($item->getProduct()->getOSProductNumber());
        }

        $offerItem->setComment($item->getComment());

        $price = 0;
        if($item->getTotalPrice()) {
            $price = $item->getTotalPrice()->getAmount();
        }

        $price = $this->priceTransformationHook($price);

        $offerItem->setOriginalTotalPrice($price);
        $offerItem->setFinalTotalPrice($price);

        $offerItem->save();

        $subItems = $item->getSubItems();
        if(!empty($subItems)) {
            $offerSubItems = array();

            foreach($subItems as $subItem) {
                $offerSubItem = $this->createOfferItem($subItem, $offerItem);
                $offerSubItem->save();
                $offerSubItems[] = $offerSubItem;
            }

            $offerItem->setSubItems($offerSubItems);
            $offerItem->save();
        }

        return $offerItem;
    }

    protected function updateOfferItem(OnlineShop_Framework_ICartItem $cartItem, OnlineShop_OfferTool_AbstractOfferItem $offerItem) {
        $offerItem->setAmount($cartItem->getCount());
        $offerItem->setProduct($cartItem->getProduct());
        if($offerItem->getProduct()) {
            $offerItem->setProductName($cartItem->getProduct()->getOSName());
            $offerItem->setProductNumber($cartItem->getProduct()->getOSProductNumber());
        }

        $offerItem->setComment($cartItem->getComment());

        $price = 0;
        if($cartItem->getTotalPrice()) {
            $price = $cartItem->getTotalPrice()->getAmount();
        }

        $price = $this->priceTransformationHook($price);

        if($price != $offerItem->getOriginalTotalPrice()) {
            $offerItem->setOriginalTotalPrice($price);
            $offerItem->setFinalTotalPrice($price);
        }


        //Delete all subitems and add them as new items
        $offerSubItems = $offerItem->getSubItems();
        foreach($offerSubItems as $i) {
            $i->delete();
        }

        $subItems = $cartItem->getSubItems();
        if(!empty($subItems)) {
            $offerSubItems = array();

            foreach($subItems as $subItem) {
                $offerSubItem = $this->createOfferItem($subItem, $offerItem);
                $offerSubItem->save();
                $offerSubItems[] = $offerSubItem;
            }

            $offerItem->setSubItems($offerSubItems);

        }

        $offerItem->save();
        return $offerItem;
    }

    /**
     * transforms price before set to the offer tool item.
     * can be used e.g. for adding vat, ...
     *
     * @param $price
     * @return mixed
     */
    protected function priceTransformationHook($price) {
        return $price;
    }

    protected function setCurrentCustomer(OnlineShop_OfferTool_AbstractOffer $offer) {
        $env = OnlineShop_Framework_Factory::getInstance()->getEnvironment();

        if(@class_exists("Object_Customer")) {
            $customer = \Pimcore\Model\Object\Customer::getById($env->getCurrentUserId());
            $offer->setCustomer($customer);
        }

        return $offer;
    }

    public function updateOfferFromCart(OnlineShop_OfferTool_AbstractOffer $offer, OnlineShop_Framework_ICart $cart, array $excludeItems = array(), $save = true) {
        $excludedItemKeys = $this->getExcludedItemKeys($excludeItems);


        if($cart->getId() != $offer->getCartId()) {
            throw new Exception("Cart does not match to the offer given, update is not possible");
        }

        //Update existing offer items
        $offerItems = $offer->getItems();
        $newOfferItems = array();
        foreach($offerItems as $offerItem) {
            $cartItem = $cart->getItem($offerItem->getCartItemKey());
            if($cartItem && !$excludedItemKeys[$offerItem->getCartItemKey()]) {
                $newOfferItems[$offerItem->getCartItemKey()] = $this->updateOfferItem($cartItem, $offerItem);
            }
        }

        //Add non existing cart items to offer
        $cartItems = $cart->getItems();
        foreach($cartItems as $cartItem) {
            if(!$newOfferItems[$cartItem->getItemKey()] && !$excludedItemKeys[$cartItem->getItemKey()]) {
                $offerItem = $this->createOfferItem($cartItem, $offer);
                $newOfferItems[$offerItem->getCartItemKey()] = $offerItem;
            }
        }

        //Delete offer items which are not needed any more
        foreach($offerItems as $offerItem) {
            if(!$newOfferItems[$offerItem->getCartItemKey()]) {
                $offerItem->delete();
            }
        }

        $offer->setItems($newOfferItems);

        //Update total price
        $offer = $this->updateTotalPriceOfOffer($offer);

        if ($save) {
            $offer->save();
        }

        return $offer;
    }

    public function updateTotalPriceOfOffer(OnlineShop_OfferTool_AbstractOffer $offer) {

        $totalPrice = 0;

        foreach($offer->getItems() as $item) {
            $totalPrice += $item->getFinalTotalPrice();
        }

        foreach($offer->getCustomItems() as $item) {
            $totalPrice += $item->getFinalTotalPrice();
        }

        if($offer->getDiscountType() == OnlineShop_OfferTool_IService::DISCOUNT_TYPE_PERCENT) {
            $discount = $totalPrice * $offer->getDiscount() / 100;
        } else {
            $discount = $offer->getDiscount();
        }

        $offer->setTotalPriceBeforeDiscount($totalPrice);
        $offer->setTotalPrice($totalPrice - $discount);
        return $offer;
    }

    public function getOffersForCart(OnlineShop_Framework_ICart $cart) {
        $offerListClass = $this->offerClass . "_List";
        $list = new $offerListClass();
        $list->setCondition("cartId = ?", array($cart->getId()));

        return $list->load();
    }

    public function createCustomOfferToolItem($product, $offer) {

    }

}