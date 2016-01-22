<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:11
 * To change this template use File | Settings | File Templates.
 */

class WishlistController extends Website_Controller_Action
{
    /**
     * @var OnlineShop_Framework_ICart
     */
    private $wishlist;


    /**
     * init wishlist controller
     */
    public function init()
    {
        parent::init();

        // load wishlist
        $this->wishlist = $this->getWishlist();
    }


    /**
     * show wishlist items
     */
    public function listAction()
    {
        // init view
        $this->enableLayout();
        $this->view->wishlist = $this->wishlist;
    }


    /**
     * add item to wishlist
     */
    public function addAction()
    {
        // init
        $status = array(
            'title' => 'Wishlist',
            'text' => 'error',
            'success' => false
        );


        // add item to wishlist
        if(($id = $this->getParam('item')))
        {
            $product = Object_Product::getById( $id );
            /* @var Website_DefaultProduct $product */
            if($product)
            {
                $this->wishlist->addItem( $product, 1);
                $this->wishlist->save();

                $status['title'] = 'Added';
                $status['success'] = true;
                $status['text'] = $product->getOSName();
                $status['image'] = $product->getFirstImage(array('width' => 48, 'height' => 48, 'aspectratio' => true))->__toString();
            }
        }

        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->json( $status );
        }
        else
        {
            $url = $this->view->url(array('action' => 'list'), 'wishlist');
            $this->redirect( $url );
        }
    }


    /**
     * remove item from wishlist
     */
    public function removeAction()
    {
        // remove item from wishlist
        if(($id = $this->getParam('item')))
        {
            $this->wishlist->removeItem( $id );
            $this->wishlist->save();
        }

        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->json( array() );
        }
        else
        {
            $url = $this->view->url(array('action' => 'list'), 'wishlist');
            $this->redirect( $url );
        }
    }


    /**
     * @param string $wishlistName
     *
     * @return OnlineShop_Framework_ICart
     */
    protected function getWishlist($wishlistName = 'wishlist')
    {
        $manager = OnlineShop_Framework_Factory::getInstance()->getCartManager();
        $wishlist = null;

        // search for the wishlist
        foreach($manager->getCarts() as $cart)
        {
            if($cart->getName() === $wishlistName)
            {
                $wishlist = $cart;
                break;
            }
        }

        // create new wishlist if not exists
        if(!$wishlist)
        {
            $wishlistId = $manager->createCart(array('name' => $wishlistName));
            $wishlist = $manager->getCart( $wishlistId );
        }

        // done :-)
        return $wishlist;
    }
}