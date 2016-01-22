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


/**
 * Class OnlineShop_Framework_ProductInterfaces_ICheckoutable
 */
interface OnlineShop_Framework_ProductInterfaces_ICheckoutable {


    /**
     * called by default CommitOrderProcessor to get the product name to store it in the order item
     * should be overwritten in mapped sub classes of product classes
     *
     * @return string
     */
    public function getOSName();

    /**
     * called by default CommitOrderProcessor to get the product number to store it in the order item
     * should be overwritten in mapped sub classes of product classes
     *
     * @return string
     */
    public function getOSProductNumber();


    /**
     * defines the name of the price system for this product.
     * there should either be a attribute in pro product object or
     * it should be overwritten in mapped sub classes of product classes
     *
     * @return string
     */
    public function getPriceSystemName();


    /**
     * defines the name of the availability system for this product.
     * there should either be a attribute in pro product object or
     * it should be overwritten in mapped sub classes of product classes
     *
     * @return string
     */
    public function getAvailabilitySystemName();


    /**
     * checks if product is bookable
     *
     * @return bool
     */
    public function getOSIsBookable($quantityScale = 1);


    /**
     * returns instance of price system implementation based on result of getPriceSystemName()
     *
     * @return OnlineShop_Framework_IPriceSystem
     */
    public function getPriceSystemImplementation();


    /**
     * returns instance of availability system implementation based on result of getAvailabilitySystemName()
     *
     * @return OnlineShop_Framework_IAvailabilitySystem
     */
    public function getAvailabilitySystemImplementation();


    /**
     * returns price for given quantity scale
     *
     * @param int $quantityScale
     * @return OnlineShop_Framework_IPrice
     */
    public function getOSPrice($quantityScale = 1);



    /**
     * returns price info for given quantity scale.
     * price info might contain price and additional information for prices like discounts, ...
     *
     * @param int $quantityScale
     * @return OnlineShop_Framework_AbstractPriceInfo
     */
    public function getOSPriceInfo($quantityScale = 1);



    /**
     * returns availability info based on given quantity
     *
     * @param int $quantity
     * @return OnlineShop_Framework_IAvailability
     */
    public function getOSAvailabilityInfo($quantity = null);




}