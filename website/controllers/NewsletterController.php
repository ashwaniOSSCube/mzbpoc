<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 28.06.13
 * Time: 14:48
 * To change this template use File | Settings | File Templates.
 */

class NewsletterController extends Website_Controller_Action
{
    public function subscribeAction () {

        // init
        $status = array(
            'message' => 'error',
            'success' => false
        );
        $newsletter = new Pimcore_Tool_Newsletter('customer');
        $params = $this->getAllParams();


        //
        if($newsletter->checkParams($params)) {
            try {
                $params["parent"] = Object_Abstract::getByPath("/newsletter/subscribers");
                $user = $newsletter->subscribe($params);

                // user and email document
                // parameters available in the email: gender, firstname, lastname, email, token, object
                // ==> see mailing framework
                $newsletter->sendConfirmationMail($user, Document::getByPath('/en/emails/newsletter-confirmation'));


                // do some other stuff with the new user
                //$user->setSomeCustomField(true);
                //$user->save();

                $status['success'] = true;
                $status['message'] = "";
            } catch (\Exception $e) {
                $status['message'] = $e->getMessage();
            }
        }


        // its a ajax request?
        if($this->getRequest()->isXmlHttpRequest())
        {
            $this->_helper->viewRenderer->setNoRender(true);
            $this->getResponse()->setHeader('Content-Type', 'application/json');
            echo Zend_Json::encode( $status );
        }
        else
        {
            $this->view->status = $status;
        }
    }

    public function confirmAction() {

        $this->view->success = false;

        $newsletter = new Pimcore_Tool_Newsletter('customer');

        if($newsletter->confirm($this->getParam("token"))) {
            $this->view->success = true;
        }
    }

    public function unsubscribeAction() {

        $this->enableLayout();

        $newsletter = new Pimcore_Tool_Newsletter('customer');


        $unsubscribeMethod = null;
        $success = false;

        if($this->getParam("email")) {
            $unsubscribeMethod = "email";
            $success = $newsletter->unsubscribeByEmail($this->getParam("email"));
        }

        if($this->getParam("token")) {
            $unsubscribeMethod = "token";
            $success = $newsletter->unsubscribeByToken($this->getParam("token"));
        }

        $this->view->success = $success;
        $this->view->unsubscribeMethod = $unsubscribeMethod;
    }
}