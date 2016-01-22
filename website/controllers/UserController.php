<?php

class UserController extends Website_Controller_Action
{
    /**
     * Show login Form | check login
     */
    public function loginAction ()
    {
        // init
        $status = array(
            'success' => false,
            'message' => 'login failed'
        );

        // check user & pw
        $list = new Object_Customer_List();
        $list->setCondition('email = ? AND password = ? AND o_published = 1', array($this->getParam('username'), md5($this->getParam('password'))));
        if($list->count() === 1)
        {
            $status['success'] = true;

            // set session user
            $this->loginCustomer( $list->current() );
        }


        // send output
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            if($status['success'])
            {
                $this->redirect('/en');
            }
            else
            {
                $this->enableLayout();
                $this->view->status = $status;
            }
        }
	}


    /**
     * logout current user
     */
    public function logoutAction()
    {
        $env = OnlineShop_Framework_Factory::getInstance()->getEnvironment();
        $env->setCurrentUserId(-1);
        $env->save();

        $auth = Zend_Auth::getInstance();
        $auth->clearIdentity();

        $this->redirect('/en/shop');
    }


    /**
     * register a new user
     */
    public function registerAction()
    {
        // init
        $status = array(
            'success' => false,
            'message' => 'register failed'
        );

        // check data
        $list = new Object_Customer_List();
        $list->setCondition('email = ?', $this->getParam('email'));
        if($list->count() === 1)
        {
            // email already exsits
            $status['message'] = 'Email already exists';

        }
        else if($this->getParam('password') != $this->getParam('confirm_password'))
        {
            // user input errors...
            $status['message'] = 'user input error...';
        }
        else
        {
            // create new user
            $user = new Object_Customer();
            $user->setFirstname( $this->getParam('firstname') );
            $user->setLastname( $this->getParam('lastname') );
            $user->setEmail( $this->getParam('email') );
            $user->setPassword( $this->getParam('password') );

            // set sys params
            $user->setParentId( 10979 );
            $user->setKey( Pimcore_File::getValidFilename($this->getParam('email')) );
            $user->setPublished( true );

            // done
            $user->save();

            $status['success'] = true;
            $this->loginCustomer( $user );
        }


        // send output
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            if($status['success'])
            {
                $this->redirect('/en/shop');
            }
            else
            {
                $this->enableLayout();
                $this->view->status = $status;
            }
        }
    }


    /**
     * @param Object_Customer $user
     *
     * @return bool
     */
    protected function loginCustomer(Object_Customer $user)
    {
        /* @var Object_User $user */
        $auth = Zend_Auth::getInstance();
        $auth->getStorage()->write($user->getId());


        // init ecommerce framework
        $env = OnlineShop_Framework_Factory::getInstance()->getEnvironment();
        $env->setCurrentUserId( $user->getId() );
        $env->save();

        return true;
    }


    /**
     * send email with password
     */
    public function forgotAction()
    {
        // init
        $status = array(
            'success' => false,
            'message' => 'user.forgot.unknown'
        );


        // try to load customer
        $customer = Object_Customer::getByEmail( $this->getParam('email'), array('limit' => 1));

        if($customer)
        {
            // send email
            $status['success'] = true;
            $status['message'] = 'user.forgot.send';
        }


        // send output
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            $this->enableLayout();
            $this->view->status = $status;
        }
    }
}
