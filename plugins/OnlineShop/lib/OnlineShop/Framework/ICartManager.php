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
 * Interface OnlineShop_Framework_ICartManager
 */
interface OnlineShop_Framework_ICartManager extends OnlineShop_Framework_IComponent {
 
    /**
     * returns cart class name configured in the xml
     *
     * Is also responsible for checking if guest cart class should be used or not,
     * by calling OnlineShop_Framework_IEnvironment::getUseGuestCart();
     *
     *
     * @return string
     */
    public function getCartClassName();
    
    /**
     * adds item to given cart
     *
     * @param OnlineShop_Framework_ProductInterfaces_ICheckoutable  $product   - product to add
     * @param float                                                 $count
     * @param string                                                $key       - optional key of cart where the item should be added to
     * @param null|string                                           $itemKey   - optional item key
     * @param bool                                                  $replace   - replace item if same key already exists
     * @param array                                                 $params    - optional addtional item information
     * @param OnlineShop_Framework_AbstractSetProductEntry[]        $subProducts
     * @param null|string                                           $comment
     *
     * @return string - item key
     */
    public function addToCart(OnlineShop_Framework_ProductInterfaces_ICheckoutable $product, $count,  $key = null, $itemKey = null, $replace = false, $params = array(), $subProducts = array(), $comment = null);

    /**
     * removes item from given cart
     *
     * @param string      $itemKey
     * @param null|string $key     - optional identification of cart in case of multi cart
     * @return void
     */
    public function removeFromCart($itemKey, $key = null);

    /**
     * returns cart
     *
     * @param null|string  $key - optional identification of cart in case of multi cart
     * @return OnlineShop_Framework_ICart
     */
    public function getCart($key = null);

    /**
     * returns cart by name
     *
     * @param string $name
     * @return OnlineShop_Framework_ICart
     */
    public function getCartByName($name);

    /**
     * returns all carts
     *
     * @return OnlineShop_Framework_ICart[]
     */
    public function getCarts();

    /**
     * clears given cart
     *
     * @param null|string  $key - optional identification of cart in case of multi cart
     * @return void
     */
    public function clearCart($key = null);

    /**
     * creates new cart
     *
     * @param  array   $param - array of cart information
     * @return string  key of new created cart
     */
    public function createCart($param);

    /**
     * deletes cart
     *
     * @param null|string  $key - optional identification of cart in case of multi cart
     * @return void
     */
    public function deleteCart($key = null);


    /**
     * creates price calculator for given cart
     *
     * @return OnlineShop_Framework_ICartPriceCalculator
     */
    public function getCartPriceCalculator(OnlineShop_Framework_ICart $cart);

    /**
     * @deprecated
     *
     * use getCartPriceCalculator instead
     *
     * @abstract
     * @return OnlineShop_Framework_ICartPriceCalculator
     */
    public function getCartPriceCalcuator(OnlineShop_Framework_ICart $cart);
}
