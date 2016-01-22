<?php

class Website_OnlineShop_Checkout_Confirm extends OnlineShop_Framework_Impl_Checkout_AbstractStep implements OnlineShop_Framework_ICheckoutStep
{
    /**
     * namespace key
     */
    const PRIVATE_NAMESPACE = 'confirm';

    /**
     * @return string
     */
    public function getName()
    {
        return 'confirm';
    }

    /**
     * commits step and sets delivered data
     * @param  $data
     * @return bool
     */
    public function commit($data) {
        $this->cart->setCheckoutData(self::PRIVATE_NAMESPACE, json_encode($data));
        return true;
    }

    /**
     * @return mixed
     */
    public function getData() {
        $data = json_decode($this->cart->getCheckoutData(self::PRIVATE_NAMESPACE));
        return $data;
    }
}