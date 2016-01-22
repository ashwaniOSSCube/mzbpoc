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
 * Interface OnlineShop_Framework_ICheckoutManager
 */
interface OnlineShop_Framework_ICheckoutManager {

    /**
     * returns all checkout steps defined for this checkout
     *
     * @return OnlineShop_Framework_ICheckoutStep[]
     */
    public function getCheckoutSteps();

    /**
     * returns checkout step with given name
     *
     * @param  string $stepName
     * @return OnlineShop_Framework_ICheckoutStep
     */
    public function getCheckoutStep($stepName);

    /**
     * returns current checkout step
     *
     * @return OnlineShop_Framework_ICheckoutStep
     */
    public function getCurrentStep();

    /**
     * returns the cart the checkout is started with
     *
     * @return OnlineShop_Framework_ICart
     */
    public function getCart();

    /**
     * commits checkout step
     * all previous steps must be committed, otherwise committing step is not allowed
     *
     * @param OnlineShop_Framework_ICheckoutStep $step
     * @param  mixed                             $data
     * @return bool
     */
    public function commitStep(OnlineShop_Framework_ICheckoutStep $step, $data);

    /**
     * checks if checkout is finished (= all checkout steps are committed)
     * only a finished checkout can be committed
     *
     * @return bool
     */
    public function isFinished();

    /**
     * starts payment for checkout - only possible if payment provider is configured
     * sets cart to read only mode since it must not changed during ongoing payment process
     *
     * @return OnlineShop_Framework_AbstractPaymentInformation
     */
    public function startOrderPayment();

    /**
     * returns order (creates it if not available yet)
     * - delegates to commit order processor
     *
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function getOrder();

    /**
     * commits order payment
     *   - updates order payment information in order object
     *   - only when payment status == [ORDER_STATE_COMMITTED, ORDER_STATE_PAYMENT_AUTHORIZED] -> order is committed
     *
     * use this for committing order when payment is activated
     *
     * @param OnlineShop_Framework_Payment_IStatus $status
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function commitOrderPayment(OnlineShop_Framework_Payment_IStatus $status);

    /**
     * commits order - does not consider any payment
     *
     * use this for committing order when no payment is activated
     *
     * @return OnlineShop_Framework_AbstractOrder
     */
    public function commitOrder();

    /**
     * returns if checkout process and subsequently order is committed
     *
     * @return bool
     */
    public function isCommitted();

    /**
     * returns payment adapter
     *
     * @return OnlineShop_Framework_IPayment|null
     */
    public function getPayment();

    /**
     * cleans up orders with state pending payment after 1h -> delegates this to commit order processor
     *
     * @return void
     */
    public function cleanUpPendingOrders();
}
