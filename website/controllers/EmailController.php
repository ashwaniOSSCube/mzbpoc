<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 21.06.13
 * Time: 15:25
 * To change this template use File | Settings | File Templates.
 */

class EmailController extends Website_Controller_Action
{

    public function orderConfirmationAction()
    {
        $this->enableLayout();
        $this->setLayout('email');

        $this->view->user = $this->getParam('customer');
        $this->view->cart = $this->getParam('cart');
        $this->view->order = $this->getParam('order');


        // preview
        if($this->getParam('pimcore_preview') === "true")
        {
            $this->view->user = Object_Customer::getById(10980);
            $this->view->cart = $this->getCart();
            $this->view->order = Object_OnlineShopOrder::getById(11063); # 11061
        }
    }


    /**
     * create confirm email
     * @todo
     */
    public function newsletterConfirmAction()
    {
        $this->enableLayout();
        $this->setLayout('email');

    }


    /**
     * @param string $cartName
     *
     * @return OnlineShop_Framework_ICart
     */
    protected function getCart($cartName = 'cart')
    {
        // init
        $manager = OnlineShop_Framework_Factory::getInstance()->getCartManager();
        $cart = null;

        // search for the cart
        foreach($manager->getCarts() as $current)
        {
            if($current->getName() === $cartName)
            {
                $cart = $current;
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