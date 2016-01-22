<?php

class Website_Controller_Action extends Pimcore_Controller_Action_Frontend
{
    /**
     * @var string
     */
    protected $language;

    /**
     * Init Website Controller
     */
    public function init ()
    {
		// init parent
        parent::init();


        // workaround...
        Zend_Registry::set("Zend_Locale", new Zend_Locale("en_GB"));
        // workaround...


        // set locale
		if(Zend_Registry::isRegistered("Zend_Locale")) {
            $locale = Zend_Registry::get("Zend_Locale");
        } else {
            $locale = new Zend_Locale("en_US");
            Zend_Registry::set("Zend_Locale", $locale);
        }

        // set global view params
        $this->view->language = $locale->getLanguage();
        $this->language = $locale->getLanguage();
        $this->setParam('country', $this->language);


        $this->view->addHelperPath(PIMCORE_WEBSITE_PATH . "/lib/Website/View/Helper", "Website_View_Helper_");

        $this->checkForUser();
    }

    protected function checkForUser() {
        $environment = OnlineShop_Framework_Factory::getInstance()->getEnvironment();

        $userId = Zend_Auth::getInstance()->getIdentity();
        $user = Object_Customer::getById($userId);

        if($user) {
            $this->currentUser = $user;
            $this->view->currentUser = $user;

            $environment->setUseGuestCart(false);
            $environment->setCurrentUserId($user->getId());
            $environment->save();

        } else {
            $environment->setUseGuestCart(true);
            $environment->save();
        }

    }
	
}
