<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
$user = $this->user;
/* @var Object_User $user */
$cart = $this->cart;
/* @var OnlineShop_Framework_ICart $cart */
?>
<div class="container">
    <div id="mainbody">

        <?= $this->partial("checkout/steps/header.php", array("step" => $this->step)) ?>


        <div class="row">
            <div class="span3">
                <div id="sidebar" class="sidebar-left">
                    <div class="widget">
                        <h4 class="title"><?= $this->translate("cart.summary") ?></h4>
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <td><?= count($cart->getItems()) ?>x <?= $this->translate("cart.items") ?></td>
                                    <td><?= $cart->getPriceCalculator()->getSubTotal() ?></td>
                                </tr>
                                <tr>
                                    <td><b><?= $this->translate("cart.subtotal") ?></b></td>
                                    <td><b><?= $cart->getPriceCalculator()->getSubTotal() ?></b></td>
                                </tr>

                                <?php foreach ($cart->getPriceCalculator()->getPriceModifications() as $name => $modification) { ?>
                                    <tr>
                                        <td><?= $modification->getDescription() ? $modification->getDescription() : $this->translate("cart_modification_" . $name) ?></td>
                                        <td><?= $modification ?></td>
                                    </tr>
                                <?php } ?>

                                <tr>
                                    <td><b><?= $this->translate("cart.grandtotal") ?></b></td>
                                    <td><b><?= $cart->getPriceCalculator()->getGrandTotal() ?></b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <?php $deliveryAddress = $this->deliveryAddress->getData() ?>
                    <?php if($deliveryAddress) { ?>
                        <div class="widget">
                            <h4 class="title"><?= $this->translate("checkout.deliveryaddress") ?></h4>
                            <b><?= $deliveryAddress->firstname ?> <?= $deliveryAddress->lastname ?></b><br/>
                            <?php if($deliveryAddress->company) { ?>
                                <?= $deliveryAddress->company ?> <br />
                            <?php } ?>
                            <?= $deliveryAddress->address ?><br/>
                            <?= $deliveryAddress->zip . ' ' . $deliveryAddress->city ?><br/>
                            <?= Zend_Locale::getTranslation(strtoupper($deliveryAddress->country), 'Country')  ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="span9">
                <?= $this->render(sprintf('checkout/steps/%s.php', $this->step)) ?>
            </div>
        </div>
    </div>
</div>