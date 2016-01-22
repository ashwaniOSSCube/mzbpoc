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


class OnlineShop_Framework_Impl_Cart_List_Resource extends \Pimcore\Model\Listing\Resource\AbstractResource {

    protected $cartClass = 'OnlineShop_Framework_Impl_Cart';

    /**
     * @return array
     */
    public function load() {
        $carts = array();
        $cartIds = $this->db->fetchCol("SELECT id FROM " . OnlineShop_Framework_Impl_Cart_Resource::TABLE_NAME .
                                                 $this->getCondition() . $this->getOrder() . $this->getOffsetLimit());

        foreach ($cartIds as $id) {
            $carts[] = call_user_func(array($this->getCartClass(), 'getById'), $id);
        }

        $this->model->setCarts($carts);

        return $carts;
    }

    public function getTotalCount() {
        $amount = $this->db->fetchRow("SELECT COUNT(*) as amount FROM `" . OnlineShop_Framework_Impl_Cart_Resource::TABLE_NAME . "`" . $this->getCondition());
        return $amount["amount"];
    }

    public function setCartClass($cartClass)
    {
        $this->cartClass = $cartClass;
    }

    public function getCartClass()
    {
        return $this->cartClass;
    }

}