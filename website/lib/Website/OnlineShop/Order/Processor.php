<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 29.05.13
 * Time: 08:44
 * To change this template use File | Settings | File Templates.
 */

class Website_OnlineShop_Order_Processor extends OnlineShop_Framework_Impl_CommitOrderProcessor
{
    /**
     * save individually data
     * @param OnlineShop_Framework_ICart         $cart
     * @param OnlineShop_Framework_AbstractOrder $order
     */
    protected function processOrder(OnlineShop_Framework_ICart $cart, OnlineShop_Framework_AbstractOrder $order)
    {
        /* @var Object_OnlineShopOrder $order*/

        $checkout = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );
        $deliveryAddress = $checkout->getCheckoutStep('deliveryaddress')->getData();
        /* @var Website_OnlineShop_Order_DeliveryAddress $deliveryAddress */


        // insert delivery address
        $order->setCustomerName( $deliveryAddress->firstname . ' ' . $deliveryAddress->lastname );
        $order->setCustomerCompany( $deliveryAddress->company );
        $order->setCustomerStreet( $deliveryAddress->address );
        $order->setCustomerZip( $deliveryAddress->zip );
        $order->setCustomerCity( $deliveryAddress->city );
        $order->setCustomerCountry( $deliveryAddress->country );
        $order->setCustomerEmail( $deliveryAddress->email );

    }

    protected function sendConfirmationMail(OnlineShop_Framework_ICart $cart, OnlineShop_Framework_AbstractOrder $order) {
        $params = array();
        $params["cart"] = $cart;
        $params["order"] = $order;
        $params["ordernumber"] = $order->getOrdernumber();

        if($order->getCustomer()) {
            $params["customer"] = $order->getCustomer();
            $email = $order->getCustomer()->getEmail();
        } else {
            $tmpCustomer = new Object_Customer();
            $tmpCustomer->setEmail($order->getGuestEmail());
            $tmpCustomer->setFirstname($order->getDeliveryAddressLine1());
            $tmpCustomer->setLastname($order->getDeliveryAddressLine2());
            $params["customer"] = $tmpCustomer;
            $email = $order->getGuestEmail();
        }

        $mail = new Pimcore_Mail(array("document" => $this->confirmationMail, "params" => $params));
        $mail->addTo($email);
        $mail->send();
    }
}