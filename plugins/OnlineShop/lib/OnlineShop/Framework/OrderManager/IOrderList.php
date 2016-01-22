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


namespace OnlineShop\Framework\OrderManager;

use SeekableIterator;
use Countable;
use Zend_Paginator_Adapter_Interface;
use Zend_Paginator_AdapterAggregate;
use Zend_Db_Select;
use ArrayAccess;


/**
 * Interface IOrderList
 *
 * @package OnlineShop\Framework\OrderManager
 * @method IOrderListItem current()
 */
interface IOrderList extends SeekableIterator, Countable, Zend_Paginator_Adapter_Interface, Zend_Paginator_AdapterAggregate, ArrayAccess
{
    const LIST_TYPE_ORDER = 'order';
    const LIST_TYPE_ORDER_ITEM = 'item';

    /**
     * @return Zend_Db_Select
     */
    public function getQuery();

    /**
     * @return \OnlineShop\Framework\OrderManager\IOrderListItem[]
     */
    public function load();

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return IOrderList
     */
    public function setLimit($limit, $offset = 0);

    /**
     * @return int
     */
    public function getLimit();

    /**
     * @return int
     */
    public function getOffset();

    /**
     * @param string $order
     *
     * @return IOrderList
     */
    public function setOrder($order);

    /**
     * @param string $state
     *
     * @return IOrderList
     */
    public function setOrderState($state);

    /**
     * @return string
     */
    public function getOrderState();
    /**
     * @param string $type
     *
     * @return IOrderList
     */
    public function setListType($type);

    /**
     * @return string
     */
    public function getListType();


    /**
     * @return string
     */
    public function getItemClassName();

    /**
     * @param string $className
     *
     * @return $this
     */
    public function setItemClassName($className);


    /**
     * enable payment info query
     * table alias: paymentInfo
     *
     * @return $this
     */
    public function joinPaymentInfo();

    /**
     * enable order item objects query
     * table alias: orderItemObjects
     *
     * @return $this
     */
    public function joinOrderItemObjects();

    /**
     * enable product query
     * table alias: product
     *
     * @param int $classId
     *
     * @return $this
     */
    public function joinProduct($classId);

    /**
     * enable customer query
     * table alias: customer
     *
     * @param int $classId
     *
     * @return $this
     */
    public function joinCustomer($classId);

    /**
     * enable pricing rule query
     * table alias: pricingRule
     *
     * @return $this
     */
    public function joinPricingRule();

    /**
     * @param string $condition
     * @param string $value
     *
     * @return $this
     */
    public function addCondition($condition, $value = null);

    /**
     * @param $field
     *
     * @return $this
     */
    public function addSelectField($field);

    /**
     * @param IOrderListFilter $filter
     *
     * @return $this
     */
    public function addFilter(IOrderListFilter $filter);
}
