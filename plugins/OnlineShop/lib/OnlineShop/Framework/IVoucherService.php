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


interface OnlineShop_Framework_IVoucherService
{
    /**
     * Voucherservice get initialized with config settings from Onlineshop Config.
     * @param $sysConfig
     */
    public function __construct($sysConfig);

    /**
     * Gets the correct token manager and calls its checkToken() function.
     *
     * @param string $code
     * @param Onlineshop_Framework_ICart $cart
     * @return bool
     */
    public function checkToken($code, Onlineshop_Framework_ICart $cart);

    /**
     * Gets the correct token manager and calls its reserveToken() function.
     *
     * @param string $code
     * @param Onlineshop_Framework_ICart $cart
     * @return bool
     */
    public function reserveToken($code, Onlineshop_Framework_ICart $cart);

    /**
     * Gets the correct token manager and calls its applyToken() function, which returns
     * the ordered token object which gets appended to the order object. The token
     * reservations gets released.
     *
     * @param string $code
     * @param Onlineshop_Framework_ICart $cart
     * @param OnlineShop_Framework_AbstractOrder $order
     * @return bool
     */
    public function applyToken($code, Onlineshop_Framework_ICart $cart, OnlineShop_Framework_AbstractOrder $order);

    /**
     * Gets the correct token manager and calls its releaseToken() function, which removes a reservations.
     *
     * @param string $code
     * @param Onlineshop_Framework_ICart $cart
     * @return bool
     */
    public function releaseToken($code, Onlineshop_Framework_ICart $cart);

    /**
     * Cleans the token reservations due to sysConfig duration settings, if no series Id is
     * set all reservations older than the set duration get removed.
     *
     * @param null|string $seriesId
     * @return bool
     */
    public function cleanUpReservations($seriesId = null);

    /**
     * Removes all tokens from a voucher series and its reservations,
     * not considering any type of filter.
     *
     * @param \Pimcore\Model\Object\OnlineShopVoucherSeries $series
     * @return bool
     */
    public function cleanUpVoucherSeries(\Pimcore\Model\Object\OnlineShopVoucherSeries $series);

    /**
     * Removes all statistics, optionally a seriesId can be passed, to only remove from one series.
     *
     * @param null|string $seriesId
     * @return bool
     */
    public function cleanUpStatistics($seriesId = null);
}