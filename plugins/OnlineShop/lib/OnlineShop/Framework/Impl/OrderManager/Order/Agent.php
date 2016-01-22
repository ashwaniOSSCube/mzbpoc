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


namespace OnlineShop\Framework\Impl\OrderManager\Order;

use OnlineShop\Framework\OrderManager\IOrderAgent;
use OnlineShop_Framework_Payment_IStatus;
use OnlineShop_Framework_IPayment;
use OnlineShop_Framework_Factory;
use Exception;

use Zend_Date;
use OnlineShop\Framework\Impl\OrderManager;
use OnlineShop_Framework_AbstractOrder as Order;
use OnlineShop_Framework_AbstractOrderItem as OrderItem;

use Pimcore\Model\Element\Note;
use Pimcore\Model\Element\Note\Listing as NoteListing;
use Pimcore\Model\Object\Concrete;
use Pimcore\Model\Object\Fieldcollection;
use Pimcore\Model\Object\Fieldcollection\Data\PaymentInfo;
use Pimcore\Model\Object\Objectbrick\Data as ObjectbrickData;


class Agent implements IOrderAgent
{
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var OnlineShop_Framework_IPayment
     */
    protected $paymentProvider;

    /**
     * @var OnlineShop_Framework_Factory
     */
    protected $factory;

    /**
     * @var Note[]
     */
    protected $fullChangeLog;


    /**
     * @param OnlineShop_Framework_Factory $factory
     * @param Order                        $order
     */
    public function __construct(OnlineShop_Framework_Factory $factory, Order $order)
    {
        $this->order = $order;
        $this->factory = $factory;
    }


    /**
     * @return Order
     */
    public function getOrder()
    {
        return $this->order;
    }


    /**
     * cancel order item and refund payment
     *
     * @param OrderItem $item
     *
     * @return $this
     * @throws \Exception
     */
    public function itemCancel(OrderItem $item)
    {
        // add log note
        $note = $this->createNote( $item );
        $note->setTitle( __FUNCTION__ );


        // change item
        $item->setOrderState( Order::ORDER_STATE_CANCELLED );


        // cancel complete order if all items are canceled
//        $cancel = true;
//        foreach($this->getOrder()->getItems() as $i)
//        {
//            /* @var OrderItem $i */
//            if($i->getOrderState() != Order::ORDER_STATE_CANCELLED)
//            {
//                $cancel = false;
//                break;
//            }
//        }
//
//
//        // cancel complete order
//        if($cancel)
//        {
//            $this->getOrder()->setOrderState( Order::ORDER_STATE_CANCELLED )->save();
//        }


        // commit changes
        $item->save();
        $note->save();

        return $note;
    }


    /**
     * change order item
     *
     * @param OrderItem $item
     * @param float $amount
     *
     * @return $this
     */
    public function itemChangeAmount(OrderItem $item, $amount)
    {
        // init
        $amount = floatval($amount);

        // add log note
        $note = $this->createNote( $item );
        $note->setTitle( __FUNCTION__ );
        $oldAmount = $item->getAmount();
        $note->addData('amount.old', 'text', $oldAmount);
        $note->addData('amount.new', 'text', $amount);


        // change
        $item->setAmount( $amount );


        // save
        $item->save();
        $note->save();

        return $note;
    }


    /**
     * start item complaint
     *
     * @param OrderItem $item
     * @param float     $quantity
     *
     * @return Note
     */
    public function itemComplaint(OrderItem $item, $quantity)
    {
        // add log note
        $note = $this->createNote( $item );
        $note->setTitle( __FUNCTION__ );
        $note->addData('quantity', 'text', $quantity);


        // save
        $note->save();

        return $note;

    }


    /**
     * set a item state
     *
     * @param OrderItem $item
     * @param string    $state
     *
     * @return Note
     */
    public function itemSetState(OrderItem $item, $state)
    {
        // add log note
        $note = $this->createNote( $item );
        $note->setTitle( __FUNCTION__ );

        $oldState = $item->getOrderState();
        $note->addData('state.old', 'text', $oldState);
        $note->addData('state.new', 'text', $state);


        // change
        $item->setOrderState( $state );


        // save
        $item->save();
        $note->save();

        return $note;

    }


    /**
     * @param Concrete $object
     *
     * @return Note
     */
    protected function createNote(Concrete $object)
    {
        // general
        $note = new Note();
        $note->setElement( $object );
        $note->setDate( time() );

        $note->setType( 'order-agent' );

        return $note;
    }



    /**
     * @return bool
     */
    public function hasPayment()
    {
        return !empty($this->getOrder()->getPaymentInfo());
    }


    /**
     * @return \Zend_Currency
     */
    public function getCurrency()
    {
        return new \Zend_Currency($this->getOrder()->getCurrency(), $this->factory->getEnvironment()->getCurrencyLocale());
    }


    /**
     * @return OnlineShop_Framework_IPayment
     */
    public function getPaymentProvider()
    {
        if(!$this->paymentProvider)
        {
            // init
            $order = $this->getOrder();


            // get first available provider
            foreach($order->getPaymentProvider()->getBrickGetters() as $method)
            {
                $providerData = $order->getPaymentProvider()->{$method}();
                if($providerData)
                {
                    /* @var \Pimcore\Model\Object\Objectbrick\Data\PaymentAuthorizedQpay $providerData */

                    // get provider data
                    $name = strtolower(str_replace('PaymentProvider', '', $providerData->getType()));
                    $authorizedData = [];
                    foreach($providerData->getObjectVars() as $field => $value)
                    {
                        if(preg_match('#^auth_(?<name>\w+)$#i', $field, $match))
                        {
                            $func = 'get' . $field;
                            $authorizedData[$match['name']] = $providerData->$func();
                        }
                    }


                    // init payment
                    $paymentProvider = $this->factory->getPaymentManager()->getProvider( $name );
                    $paymentProvider->setAuthorizedData( $authorizedData );

                    $this->paymentProvider = $paymentProvider;

                    break;
                }
            }
        }

        return $this->paymentProvider;
    }

    /**
     * @param OnlineShop_Framework_IPayment $paymentProvider
     *
     * @return $this
     */
    public function setPaymentProvider(OnlineShop_Framework_IPayment $paymentProvider)
    {
        $this->paymentProvider = $paymentProvider;


        // save provider data
        $order = $this->getOrder();

        $provider = $order->getPaymentProvider();
        /* @var \Pimcore\Model\Object\OnlineShopOrder\PaymentProvider $provider */


        // load existing
        $getter = 'getPaymentProvider' . $paymentProvider->getName();
        $providerData = $provider->{$getter}();
        /* @var ObjectbrickData\PaymentProvider* $providerData */

        if(!$providerData)
        {
            // create new
            $class = '\Pimcore\Model\Object\Objectbrick\Data\PaymentProvider' . $paymentProvider->getName();
            $providerData = new $class( $order );
            $provider->{'setPaymentProvider' . $paymentProvider->getName()}( $providerData );
        }


        // update authorizedData
        $authorizedData = $paymentProvider->getAuthorizedData();
        foreach($authorizedData as $field => $value)
        {
            $setter = 'setAuth_' . $field;
            if(method_exists($providerData, $setter))
            {
                $providerData->{$setter}( $value );
            }
        }

        $order->save();
        return $this;
    }


    /**
     * @param bool $forceNew
     *
     * @return PaymentInfo
     * @throws Exception
     */
    public function startPayment($forceNew = true)
    {
        $order = $this->getOrder();

        $paymentInformation = $order->getPaymentInfo();
        $currentPaymentInformation = null;
        if($paymentInformation) {
            foreach($paymentInformation as $paymentInfo) {
                if($paymentInfo->getPaymentState() == $order::ORDER_STATE_PAYMENT_PENDING) {
                    $currentPaymentInformation = $paymentInfo;
                    break;
                }
            }
        } else {
            $paymentInformation = new Fieldcollection();
            $order->setPaymentInfo($paymentInformation);
        }

        if(empty($currentPaymentInformation) && $forceNew) {
            $currentPaymentInformation = new PaymentInfo();
            $currentPaymentInformation->setPaymentStart( Zend_Date::now() );
            $currentPaymentInformation->setPaymentState( $order::ORDER_STATE_PAYMENT_PENDING );
            $currentPaymentInformation->setInternalPaymentId(uniqid("payment_") . "~" . $order->getId());

            $paymentInformation->add($currentPaymentInformation);

            $order->save();
        }

        return $currentPaymentInformation;
    }


    /**
     * @param OnlineShop_Framework_Payment_IStatus $status
     *
     * @return Order
     * @throws Exception
     */
    public function updatePayment(OnlineShop_Framework_Payment_IStatus $status)
    {
        $order = $this->getOrder();

        $paymentInformation = $order->getPaymentInfo();
        $currentPaymentInformation = null;
        foreach($paymentInformation as $paymentInfo) {
            if($paymentInfo->getInternalPaymentId() == $status->getInternalPaymentId()) {
                $currentPaymentInformation = $paymentInfo;
            }
        }

        if(empty($currentPaymentInformation)) {
            throw new Exception("Paymentinformation with internal id " . $status->getInternalPaymentId() . " not found.");
        }

        // save basic payment data
        $currentPaymentInformation->setPaymentFinish( Zend_Date::now() );
        $currentPaymentInformation->setPaymentReference( $status->getPaymentReference() );
        $currentPaymentInformation->setPaymentState( $status->getStatus() );
        $currentPaymentInformation->setMessage( $status->getMessage() );
        $currentPaymentInformation->setProviderData( json_encode($status->getData()) );


        // opt. save additional payment data separately
        foreach($status->getData() as $field => $value)
        {
            $setter = 'setProvider_' . $field;
            if(method_exists($currentPaymentInformation, $setter))
            {
                $currentPaymentInformation->$setter( $value );
            }
        }


        $order->save();

        return $this;
    }


    /**
     * @return Note[]
     */
    public function getFullChangeLog()
    {
        if(!$this->fullChangeLog)
        {
            // init
            $order = $this->getOrder();

            // load order events
            $noteList = new NoteListing();
            /* @var \Pimcore\Model\Element\Note\Listing $noteList */

            $cid = [ $order->getId() ];
            foreach($order->getItems() as $item)
            {
                $cid[] = $item->getId();
                foreach($item->getSubItems() as $subItem)
                {
                    $cid[] = $subItem->getId();
                }
            }

            $noteList->addConditionParam('type = ?', 'order-agent');
            $noteList->addConditionParam(sprintf('cid in(%s)', implode(',', $cid)), '');

            $noteList->setOrderKey('date');
            $noteList->setOrder('desc');

            $this->fullChangeLog = $noteList->load();
        }

        return $this->fullChangeLog;
    }
}