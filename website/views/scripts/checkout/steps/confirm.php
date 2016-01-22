<?php

$cart = $this->cart;
/* @var OnlineShop_Framework_ICart $cart */
?>

<h1 class="page-title"><?= $this->translate("checkout.confirm.ttl") ?></h1>

<?php if(count($this->errors)): ?>
    <div class="alert alert-error">
        <?php foreach($this->errors as $error): ?>
            <p><?= $this->translate("checkout.error.confirm." . $error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if(count($this->paymentErrors)): ?>
    <div class="alert alert-error">
        <?php foreach($this->paymentErrors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<div id="checkout-confirm">

    <div id="cart-list">
        <?php if(count($cart->getItems()) === 0): ?>
            <?= $this->translate("cart.empty") ?>
        <?php else: ?>
            <table id="cart-list-items">
                <thead>
                <tr>
                    <th class="cart-list-items-image"></th>
                    <th class="cart-list-items-name"><?= $this->translate("cart.productname") ?></th>
                    <th class="cart-list-items-unitprice" width="100"><?= $this->translate("cart.unitprice") ?></th>
                    <th class="cart-list-items-quantity" width="80"><?= $this->translate("cart.quantity") ?></th>
                    <th class="cart-list-items-subtotal" width="100"><?= $this->translate("cart.totalprice") ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($cart->getItems() as $item): $linkDetail = $item->getProduct()->getShopDetailLink($this); ?>
                    <tr>
                        <td class="cart-list-items-image"><a href="<?= $linkDetail ?>" ><img src="<?= $item->getProduct()->getFirstImage(array('width' => 120, 'height' => 120, 'aspectratio' => true)) ?> " alt="" border="0" /></a></td>
                        <td class="cart-list-items-name" valign="top"><a href="<?= $linkDetail ?>" ><?= $item->getProduct()->getOSName() ?></a></td>
                        <td class="cart-list-items-unitprice"><?= $item->getPrice() ?></td>
                        <td class="cart-list-items-quantity"><?= $item->getCount() ?></td>
                        <td class="cart-list-items-subtotal"><?= $item->getTotalPrice() ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
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



    <form action="<?= $this->url(array('action' => 'confirm'), 'checkout') ?>" method="post">

        <div class="agb">

            <input type="checkbox" value="true" name="agb-accepted" id="agb-accept" />
            <?php
                $agbLink = "<a href='" . $this->document->getProperty("terms") . "' target='_blank'>" . $this->document->getProperty("terms")->getTitle() . "</a>";
            ?>
            <label for="agb-accept" class="<?= in_array('agb', $this->errors) ? 'text-error':'' ?>"><?= $this->translate("checkout.confirm.agbs", array($agbLink)) ?></label>
        </div>
        <input type="submit" value="<?= $this->translate("checkout.confirm.order") ?>" class="btn btn-primary" style="width: 348px;" />
    </form>
</div>