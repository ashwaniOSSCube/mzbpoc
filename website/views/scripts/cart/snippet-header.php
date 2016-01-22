<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 16:24
 * To change this template use File | Settings | File Templates.
 */
$cart = $this->cart;
/* @var OnlineShop_Framework_ICart $cart */

// count all cart items with quantity
$itemCount = count($cart->getItems());

// get cart subtotal
$subTotal = $cart->getPriceCalculator()->getSubTotal();
?>
<span class="cart_details"><?= $itemCount ?> items, Total of <strong><?= $subTotal ?></strong>
    <?php if($itemCount > 0 ) { ?>
        <a href="<?= $this->url(array('action' => 'cart'), 'checkout') ?>" class="checkout">Checkout <span class="icon-chevron-right"></span></a>
    <?php } ?>
</span>