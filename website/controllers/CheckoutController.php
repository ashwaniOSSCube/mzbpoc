<?php
class CheckoutController extends Website_Controller_Action
{
    /**
     * @var OnlineShop_Framework_ICheckoutManager
     */
    protected $checkoutManager;

    /**
     * @var Object_Customer
     */
    protected $customer;


    /**
     * init controller
     */
    public function init()
    {
        parent::init();

        // cart
        $cart = $this->getCart();
        $this->view->cart = $cart;


        // checkout data
        $this->checkoutManager = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );
        $this->view->deliveryAddress = $this->checkoutManager->getCheckoutStep('deliveryaddress');


        // user
        $customer = $this->currentUser;
        if($customer)
        {
            $this->customer = $customer;
            $this->view->customer = $customer;
        }


        // if cart is empty, redirect user to the cart list view
        if(count($cart->getItems()) == 0 && !$this->getParam("id"))
        {
            $this->redirect($this->view->url(array('action' => 'list'), 'cart'));
        }
    }


    /**
     * start checkout process for the current cart
     */
    public function cartAction()
    {
        $this->redirect('/en/checkout/delivery');
    }


    /**
     * select or add a delivery address
     */
    public function deliveryAction()
    {
        // init
        $this->enableLayout();
        $this->_helper->viewRenderer('layout');
        $cart = $this->getCart();
        $checkout = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );
        $deliveryAddress = $checkout->getCheckoutStep('deliveryaddress');
        $this->view->step = 'delivery';

        // check errors
        $this->view->errors = $this->getParam('error') ? explode(',', $this->getParam('error')) : array();

        // update delivery address
        if($this->getRequest()->isPost())
        {
            $address = null;

            // pick one from address book?
            foreach($this->getAllParams() as $name => $value)
            {
                if(preg_match('#^address_(?<id>\d+)#', $name, $match))
                {
                    $addr = Object_Address::getById($match['id']);
                    /* @var Object_Address $addr */
                    if($addr)
                    {
                        $address = new Website_OnlineShop_Order_DeliveryAddress();
                        $address->firstname = $addr->getFirstname();
                        $address->lastname = $addr->getLastname();
                        $address->company = $addr->getCompany();
                        $address->address = $addr->getAddress();
                        $address->zip = $addr->getZip();
                        $address->city = $addr->getCity();
                        $address->country = $addr->getCountry();
                    }
                    break;
                }
            }

            // insert new address?
            if($address === NULL)
            {
                $address = new Website_OnlineShop_Order_DeliveryAddress();

                if(!$this->currentUser) {
                    if(strlen($this->getParam('email')) <= 3) {
                        $this->view->errors[] = 'email';
                    } else {
                        $address->email = $this->getParam('email');
                    }
                }

                if(strlen($this->getParam('shipping_firstname')) <= 3) {
                    $this->view->errors[] = 'firstname';
                }
                else {
                    $address->firstname = $this->getParam('shipping_firstname');
                }

                if(strlen($this->getParam('shipping_lastname')) <= 3) {
                    $this->view->errors[] = 'lastname';
                }
                else {
                    $address->lastname = $this->getParam('shipping_lastname');
                }

                if($this->getParam('shipping_company') != '' && strlen($this->getParam('shipping_company')) <= 3) {
                    $this->view->errors[] = 'company';
                }
                else {
                    $address->company = $this->getParam('shipping_company');
                }

                if(strlen($this->getParam('shipping_address')) <= 3) {
                    $this->view->errors[] = 'address';
                }
                else {
                    $address->address = $this->getParam('shipping_address');
                }

                if(!preg_match('#^\d{3,}$#', $this->getParam('shipping_zip'))) {
                    $this->view->errors[] = 'zip';
                }
                else {
                    $address->zip = $this->getParam('shipping_zip');
                }

                if(strlen($this->getParam('shipping_city')) <= 3) {
                    $this->view->errors[] = 'city';
                }
                else {
                    $address->city = $this->getParam('shipping_city');
                }

                if(strlen($this->getParam('shipping_country')) != 2) {
                    $this->view->errors[] = 'country';
                }
                else {
                    $address->country = $this->getParam('shipping_country');
                }
            }


            // save address if we have no errors
            if(count($this->view->errors) === 0)
            {
                // commit step
                $checkout->commitStep($deliveryAddress, $address);


                // goto next step
                $this->redirect('/en/checkout/confirm');
            }
        }
    }


    /**
     * confirm terms
     */
    public function confirmAction()
    {
        // init
        $this->enableLayout();
        $this->_helper->viewRenderer('layout');
        $this->view->step = 'confirm';

        $cart = $this->getCart();
        $this->view->cart = $cart;
        $checkout = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );
        $payment = $checkout->getPayment();

        // check errors
        $this->view->errors = array();
        if($this->getParam('error') == 'success')
        {
//            $this->view->paymentErrors = $payment->getErrors();
        }
        else if($this->getParam('error') != '') {
            $this->view->errors = explode(',', $this->getParam('error'));
        }

        $confirmStep = $checkout->getCheckoutStep('confirm');

        // go to payment
        if($this->getRequest()->isPost())
        {
            if($this->getParam('agb-accepted'))
            {
                $checkout->commitStep($confirmStep, true);

                if($payment) {
                    $this->redirect('/en/checkout/payment');
                } else {
                    $order = $checkout->commitOrder();

                    $this->redirect('/en/checkout/completed?id=' . $order->getId());
                }
            }
            else
            {
                $this->view->errors[] = 'terms';
            }
        }
    }


    /**
     * payment page with iframe
     */
    public function paymentAction()
    {
        $this->enableLayout();
        $this->_helper->viewRenderer('layout');
        $this->view->step = 'payment';
    }


    /**
     * payment iframe
     */
    public function paymentFrameAction()
    {
        // init
        $this->enableLayout();
        $this->setLayout('paymentIframe');
        $cart = $this->getCart();
        $checkout = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );

        if($checkout->isCommitted()) {
            throw new Exception("Cart already committed");
        }

        $paymentInformation = $checkout->startOrderPayment();


        $payment = $checkout->getPayment();

        // payment config
        if($payment instanceof OnlineShop_Framework_Impl_Payment_QPay)
        {
            // wirecard
            $url = 'http://'. $_SERVER["HTTP_HOST"] . "/en/checkout/payment-status?mode=";
            $config = [
                'language' => Zend_Registry::get("Zend_Locale")->getLanguage()
                , 'successURL' => $url . 'success'
                , 'cancelURL' => $url . 'cancel'
                , 'failureURL' => $url . 'failure'
                , 'serviceURL' => $url . 'service'
                , 'orderDescription' => 'Meine Bestellung bei pimcore.org'
                , 'imageURL' => 'http://'. $_SERVER["HTTP_HOST"] . '/static/images/logo-white.png'
                , 'orderIdent' => $paymentInformation->getInternalPaymentId()
            ];
        }
        else if($payment instanceof OnlineShop_Framework_Impl_Payment_PayPal)
        {
            // paypal
            $url = 'http://'. $_SERVER["HTTP_HOST"] . "/en/checkout/";
            $config = [
                'ReturnURL' => $url . 'payment-status?mode=success'
                , 'CancelURL' => $url . 'payment?error=cancel'
                , 'OrderDescription' => 'Meine Bestellung bei pimcore.org'
                , 'cpp-header-image' => '111b25'
                , 'cpp-header-border-color' => '111b25'
                , 'cpp-payflow-color' => 'f5f5f5'
                , 'cpp-cart-border-color' => 'f5f5f5'
                , 'cpp-logo-image' => 'http://'. $_SERVER["HTTP_HOST"] . '/static/images/logo_paypal.png'
                , 'InvoiceID' => $paymentInformation->getInternalPaymentId()
            ];
        }
        else if($payment instanceof OnlineShop_Framework_Impl_Payment_Datatrans)
        {
            // datatrans
            $url = 'http://'. $_SERVER["HTTP_HOST"] . "/en/checkout/payment-status?mode=";
            $config = [
                // checkout config
                'language' => Zend_Registry::get("Zend_Locale")->getLanguage()
                , 'refno' => $paymentInformation->getInternalPaymentId()
                , 'useAlias' => true
                , 'reqtype' => 'CAA'    // payment direkt ausführen

                // system
                , 'successUrl' => $url . 'success'
                , 'errorUrl' => $url . 'error'
                , 'cancelUrl' => $url . 'cancel'
            ];
        }
        else
        {
            throw new Exception("Unknown Payment configured.");
        }

        // init payment
        $this->view->payment = $payment->initPayment( $cart->getPriceCalculator()->getGrandTotal(), $config );

    }


    /**
     * got response from payment provider
     */
    public function paymentStatusAction()
    {
        // init
        $cart = $this->getCart();
        $checkout = OnlineShop_Framework_Factory::getInstance()->getCheckoutManager( $cart );
        $payment = $checkout->getPayment();


        $params = $this->getAllParams();
        if($payment instanceof OnlineShop_Framework_Impl_Payment_PayPal)
        {
            // add additional data for paypal
            $price = $cart->getPriceCalculator()->getGrandTotal();
            $params['amount'] = $price->getAmount();
            $params['currency'] = $price->getCurrency()->getShortName();
        }


        try
        {
            $paymentStatus = $payment->handleResponse( $params );

            //
//            $paymentStatus = $payment->executeDebit();
        }
        catch(Exception $e)
        {
            $this->view->goto = '/en/checkout/confirm?error=' . $e->getMessage();
            return;
        }


        $order = $checkout->commitOrderPayment($paymentStatus);
        if($checkout->isCommitted()) {
            $this->view->goto = '/en/checkout/completed?id=' . $order->getId();
        } else {
            $this->view->goto = '/en/checkout/confirm?error=' . $this->getParam('mode');
        }
    }


    /**
     * order completed
     */
    public function completedAction()
    {
        // init
        $this->enableLayout();
        $this->view->order = Object_OnlineShopOrder::getById( $this->getParam('id') );

        $itemKeyUniversal = OnlineShop_Framework_Impl_CheckoutManager::TRACK_ECOMMERCE_UNIVERSAL . "_" . $this->view->order->getOrdernumber();

        $environment = OnlineShop_Framework_Factory::getInstance()->getEnvironment();
        $codeUniversal = $environment->getCustomItem($itemKeyUniversal);

        if(!empty($codeUniversal)) {
            $this->view->gacodeUniversal = $codeUniversal;
            $environment->removeCustomItem($itemKeyUniversal);
            $environment->save();
        }

    }



    /**
     * @param string $cartName
     *
     * @return OnlineShop_Framework_ICart
     */
    protected function getCart($cartName = 'cart')
    {
        $manager = OnlineShop_Framework_Factory::getInstance()->getCartManager();
        $cart = null;

        // search for the cart
        foreach($manager->getCarts() as $cart)
        {
            if($cart->getName() === $cartName)
            {
                break;
            }
        }

        // create new cart if not exists
        if(!$cart)
        {
            $cartId = $manager->createCart(array('name' => $cartName));
            $cart = $manager->getCart( $cartId );
        }

        // done :-)
        return $cart;
    }
}