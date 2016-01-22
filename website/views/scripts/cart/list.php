<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
$cart = $this->cart;
/* @var OnlineShop_Framework_ICart $cart */
?>
<div class="container">
    <div id="mainbody">
        <div class="row">
            <div class="span9">
                <h1 class="page-title"><?= $this->translate("cart.ttl") ?></h1>

                <div id="cart-list">
                    <?php if(count($cart->getItems()) === 0): ?>
                        <?= $this->translate("cart.empty") ?>
                    <?php else: ?>
                        <form id="js-cart-form" action="<?= $this->url(array('action' => 'update'), 'cart') ?>" method="post">
                        <table id="cart-list-items">
                            <thead>
                            <tr>
                                <th class="cart-list-items-image"></th>
                                <th class="cart-list-items-name"><?= $this->translate("cart.productname") ?></th>
                                <th class="cart-list-items-unitprice" width="100"><?= $this->translate("cart.unitprice") ?></th>
                                <th class="cart-list-items-quantity" width="80"><?= $this->translate("cart.quantity") ?></th>
                                <th class="cart-list-items-subtotal" width="100"><?= $this->translate("cart.totalprice") ?></th>
                                <th class="cart-list-items-remove" width="50"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($cart->getItems() as $item): $linkDetail = $item->getProduct()->getShopDetailLink($this); ?>
                                <tr>
                                    <td class="cart-list-items-image"><a href="<?= $linkDetail ?>" ><img src="<?= $item->getProduct()->getFirstImage(array('width' => 120, 'height' => 120, 'aspectratio' => true)) ?> " alt="" border="0" /></a></td>
                                    <td class="cart-list-items-name" valign="top"><a href="<?= $linkDetail ?>" ><?= $item->getProduct()->getOSName() ?></a></td>
                                    <td class="cart-list-items-unitprice"><?= $item->getPrice() ?></td>
                                    <td class="cart-list-items-quantity">
                                        <input class="cart-quantity" type="number" name="qty[<?= $item->getItemKey() ?>]" value="<?= $item->getCount() ?>" style="width: 40px" />
                                    </td>
                                    <td class="cart-list-items-subtotal"><?= $item->getTotalPrice() ?></td>
                                    <td class="cart-list-items-remove"><a href="<?= $this->url(array('action' => 'remove', 'item' => $item->getItemKey()), 'cart') ?>" class="btn icon-remove"></a></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        </form>
                    <?php endif; ?>

                    <?php if(count($cart->getItems()) > 0 && count($cart->getGiftItems()) > 0) { ?>
                        <div class="gifts">
                            <h4><?= $this->translate("cart.gifts") ?></h4>
                            <table id="cart-list-items">
                                <thead>
                                    <tr>
                                        <th class="cart-list-items-image"></th>
                                        <th class="cart-list-items-name"><?= $this->translate("cart.productname") ?></th>
                                        <th class="cart-list-items-quantity" width="80"><?= $this->translate("cart.quantity") ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($cart->getGiftItems() as $item): $linkDetail = $item->getProduct()->getShopDetailLink($this); ?>
                                    <tr>
                                        <td class="cart-list-items-image"><a href="<?= $linkDetail ?>" ><img src="<?= $item->getProduct()->getFirstImage(array('width' => 120, 'height' => 120, 'aspectratio' => true)) ?> " alt="" border="0" /></a></td>
                                        <td class="cart-list-items-name" valign="top"><a href="<?= $linkDetail ?>" ><?= $item->getProduct()->getOSName() ?></a></td>
                                        <td class="cart-list-items-quantity"><?= $item->getCount() ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php if($cart->getItems()) { ?>
                <div class="span3">
                    <div id="sidebar" class="sidebar-left">

                        <div class="widget cartsums">
                            <h4 class="title"><?= $this->translate("cart.summary") ?></h4>
                            <table width="100%">
                                <tbody>
                                <tr>
                                    <td><?= count($cart->getItems()) ?>x <?= $this->translate("cart.items") ?></td>
                                    <td><?= $cart->getPriceCalculator()->getSubTotal() ?></td>
                                </tr>
                                <tr class="subtotal">
                                    <td><?= $this->translate("cart.subtotal") ?></td>
                                    <td><?= $cart->getPriceCalculator()->getSubTotal() ?></td>
                                </tr>

                                <?php foreach ($cart->getPriceCalculator()->getPriceModifications() as $name => $modification) { ?>
                                    <tr>
                                        <td><?= $modification->getDescription() ? $modification->getDescription() : $this->translate("cart_modification_" . $name) ?></td>
                                        <td><?= $modification ?></td>
                                    </tr>
                                <?php } ?>

                                <tr class="grandtotal">
                                    <td><b><?= $this->translate("cart.grandtotal") ?></b></td>
                                    <td><b><?= $cart->getPriceCalculator()->getGrandTotal() ?></b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <?php if(count($cart->getItems()) > 0) { ?>
                            <div id="js-cart-checkout" class="widget">
                                <div style="text-align: center; margin-top: 10px;">
                                    <form id="checkout-form" action="">

                                    </form>
                                    <a href="<?= $this->url(array('action' => 'cart'), 'checkout') ?>" class="btn btn-flat"><?= $this->translate("cart.checkoutnow") ?></a>
                                </div>
                            </div>
                        <?php } ?>

                        <div id="js-cart-update" class="widget" style="display: none">
                            <div style="text-align: center; margin-top: 10px;">
                                <a id="js-cart-update-button" href="#" class="btn btn-flat"><?= $this->translate("cart.update") ?></a>
                            </div>
                        </div>

                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col col-sm-12">
                <h4><?= $this->translate("cart.voucher-tokens-headline") ?></h4>

                <div class="token-list">
                <ul class="list-group">
                    <? foreach ($cart->getVoucherTokenCodes() as $index => $code) { ?>
                        <li class="list-group-item list-group-item-success">
                            <span class="token"><?=$code?></span>
                            <form action="<?= $this->url(array('action' => 'releasevoucher'), 'cart') ?>" style="display: inline;">
                                <input type="hidden" value="<?=$code?>" name="voucherToken">
                            <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-remove">X</span></button>
                            </form>
                        </li>
                    <?}?>
                </ul>
                </div>

                <div class="token-add">
                    <form class="form-horizontal"  id="add-voucher-form" action="<?= $this->url(array('action' => 'addvoucher'), 'cart') ?>">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" name="voucherToken" class="form-control" value="<? if ($this->voucherError) { ?><?=$this->getParam('voucherToken')?><?}?>">
                                <span class="input-group-addon">
                                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-plus"></span>&nbsp;<?= $this->translate("cart.voucher-tokens-add-button") ?></button>
                                </span>
                                <? if ($this->voucherError) { ?>
                                    <div style="margin-top: 20px" class="alert alert-danger js-fadeout"><?= $this->voucherError ?></div>
                                <? } ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
        $(document).ready(function(){
            setTimeout(function () {
                $('.js-fadeout').slideUp('fast');
            }, 3500);
        });
</script>

<style type="text/css">

</style>