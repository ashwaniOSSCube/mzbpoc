<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:11
 * To change this template use File | Settings | File Templates.
 */

class CartController extends Website_Controller_Action
{
    /**
     * @var OnlineShop_Framework_ICart
     */
    private $cart;


    /**
     * init cart controller
     */
    public function init()
    {
        parent::init();

        // get cart
        $this->cart = $this->getCart();
    }


    /**
     * show cart items
     * @todo
     */
    public function listAction()
    {
        // init view
        $this->enableLayout();

        // sort by item count asc
        $this->cart->sortItems(function (OnlineShop_Framework_ICartItem $a, OnlineShop_Framework_ICartItem $b) {

            return $a->getCount() > $b->getCount();

        });


        if ($this->getParam('voucherError')) {
            $this->view->voucherError = $this->getParam('voucherError');
        }

        $this->view->cart = $this->cart;
    }


    /**
     * add item to cart
     */
    public function addAction()
    {
        // init
        $status = array(
            'title' => 'Cart',
            'text' => 'error',
            'success' => false,
            'snippet' => array()
        );


        // add item to cart
        if(($id = $this->getParam('item')))
        {
            $product = Object_Product::getById( $id );
            /* @var Website_DefaultProduct $product */
            $qty = (int)$this->getParam('qty', 1);
            if($product)
            {
                $this->cart->addItem( $product, $qty);
                $this->cart->save();

                $status['title'] = 'Added';
                $status['success'] = true;
                $status['text'] = sprintf('%dx %s', $qty, $product->getOSName());
                $image = $product->getFirstImage(array('width' => 48, 'height' => 48, 'aspectratio' => true));
                if($image) {
                    $status['image'] = $image->__toString();
                }
            }
        }

        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {

            // add header cart snippet
            $this->snippetHeaderAction();
            $status['snippet']['snippetHeader'] = $this->view->render('cart/snippet-header.php');

            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            $url = $this->view->url(array('action' => 'list'), 'cart');
            $this->redirect( $url );
        }
    }


    /**
     * remove item from cart
     */
    public function removeAction()
    {
        // init
        $status = array(
            'title' => 'Cart',
            'text' => 'error',
            'success' => false,
            'snippet' => array()
        );

        // remove item from cart
        if(($id = $this->getParam('item')))
        {
            $product = Object_Product::getById( $id );
            /* @var Website_DefaultProduct $product */
            if($product)
            {
                $this->cart->removeItem( $id );
                $this->cart->save();

                $status['title'] = 'Removed';
                $status['success'] = true;
                $status['text'] = $product->getOSName();
                $image = $product->getFirstImage(array('width' => 48, 'height' => 48, 'aspectratio' => true));
                if($image) {
                    $status['image'] = $image->__toString();
                }
            }
        }

        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {
            // add header cart snippet
            $this->snippetHeaderAction();
            $status['snippet']['snippetHeader'] = $this->view->render('cart/snippet-header.php');

            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            $url = $this->view->url(array('action' => 'list'), 'cart');
            $this->redirect( $url );
        }
    }


    /**
     * update cart item
     */
    public function updateAction()
    {
        // init
        $status = array(
            'title' => 'Cart',
            'text' => 'error',
            'success' => false,
            'snippet' => array()
        );


        if($this->getParam("qty")) {
            foreach($this->getParam("qty") as $key => $qty) {
                $product = Object_Product::getById($key);
                if($product) {
                    $this->cart->updateItem($key, $product, intval($qty), true);
                    $this->cart->save();
                    $status['text'] = 'Quantity changed';
                    $status['success'] = true;
                }
            }

        }

        // change quantity
//        foreach($this->getAllParams() as $name => $value)
//        {
//            if(preg_match('#^(?<action>qty|comment)_(?<itemKey>\w+)#', $name, $match))
//            {
//                $item = $this->cart->getItem($match['itemKey']);
//                if($item)
//                {
//                    if($match['action'] == 'qty')
//                    {
//                        $item->setCount( (int)$value );
//                        $status['text'] = 'Quantity changed';
//                    }
//
//                    if($match['action'] == 'comment')
//                    {
//                        $item->setComment( $value );
//                        $status['text'] = 'Comment saved';
//                    }
//
//                    $item->save();
//                    $status['success'] = true;
//                }
//            }
//        }


        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {
            // add header cart snippet
            $this->snippetHeaderAction();
            $status['snippet']['snippetHeader'] = $this->view->render('cart/snippet-header.php');

            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            $url = $this->view->url(array('action' => 'list'), 'cart');
            $this->redirect( $url );
        }
    }


    /**
     * print cart summary for the header
     */
    public function snippetHeaderAction()
    {
        $this->view->cart = $this->cart;
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

        $cart = $manager->getCartByName($cartName);

        // search for the cart
        /*foreach($manager->getCarts() as $current)
        {
            if($current->getName() === $cartName)
            {
                $cart = $current;
                break;
            }
        }*/

        // create new cart if not exists
        if(!$cart)
        {
            $cartId = $manager->createCart(array('name' => $cartName));
            $cart = $manager->getCart( $cartId );
        }

        // done :-)
        return $cart;
    }

    /**
     * Adds a voucher token to cart, sets error messages and
     * redirects to list action.
     */
    public function addvoucherAction()
    {
        $voucherError = "";
        if ($token = strip_tags($this->getParam('voucherToken'))) {
            try {
                $this->cart->addVoucherToken($token);
            } catch (OnlineShop_Framework_Exception_VoucherServiceException $e) {
                $voucherError = $this->view->t('cart.msg-error.' . $e->getCode());
            }
        } else {
            $voucherError = $this->view->t('cart.msg-error-token-missing');
        }

        $url = $this->view->url(array('action' => 'list', 'voucherError' => $voucherError), 'cart');
        $this->redirect($url);
    }

    /**
     * Remove a voucher token from cart, sets error messages and
     * redirects to list action.
     */
    public function releasevoucherAction()
    {
        $voucherError = "";
        if ($code = $this->getParam('voucherToken')) {
            try {
                $this->cart->removeVoucherToken($code);
            } catch (OnlineShop_Framework_Exception_VoucherServiceException $e){
                $voucherError = $this->view->t('cart.msg-error.' . $e->getCode());
            }
        } else {
            $voucherError = $this->view->t('cart.msg-error-token-missing');
        }

        $url = $this->view->url(array('action' => 'list', 'voucherError' => $voucherError), 'cart');
        $this->redirect($url);
    }


}