<table width="700" class="content-table no-border" border="0" cellpadding="5" cellspacing="0">
    <tr>
        <td>
            <?=$this->wysiwyg('introduction')?>
        </td>
    </tr>

</table>
<?if(!$this->editmode) {?>

<table width="700" class="content-table" border="0" cellpadding="2" cellspacing="0">
    <tr>
        <td align="left" valign="middle" bgcolor="#ffffff"  class="orange" colspan="2" style="color:#596068;font-weight: bold; text-transform: uppercase;"><?=$this->translate('email.contact-data')?></td>

    </tr>
    <tr>
        <td align="left" valign="top" style="vertical-align: middle;" bgcolor="#f3f3f3" width="200" class="left" ><?=$this->translate('user.firstname')?></td>
        <td bgcolor="#f3f3f3" class="left"><?=$this->user->getFirstName()?></td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#FFFFFF" class="left"><?=$this->translate('user.lastname')?></td>
        <td bgcolor="#FFFFFF" class="left"><?=$this->user->getLastName()?></td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#f3f3f3" class="left"><?=$this->translate('user.email')?></td>
        <td bgcolor="#f3f3f3" class="left"><a href="mailto:<?=$this->user->getEmail()?>"><?=$this->user->getEmail()?></a></td>
    </tr>
</table>





<table width="700" class="content-table" border="0" cellpadding="2" cellspacing="0">
    <tr>
        <td align="left" valign="middle" bgcolor="#ffffff" class="orange" colspan="4" style="padding-top: 10px; color:#596068;font-weight: bold; text-transform: uppercase;"><?=$this->translate('email.cart')?> <?=$this->cart->getName()?></td>
    </tr>

    <tr>
        <th align="left" style="padding-left: 10px;" width="180"><?=$this->translate('cart.productname')?><br/><small><?=$this->translate('checkout.cart.productno')?></small></th>
        <th width="100"><?=$this->translate('cart.unitprice')?></th>
        <th width="60"><?=$this->translate('cart.quantity')?></th>
        <th width="100"><?=$this->translate('cart.totalprice')?></th>
    </tr>


    <?foreach($this->order->getItems() as $item) { $product = $item->getProduct();?>
    <tr>
        <td align="left" style="color: #1FA6E0; font-size: 12px;"><a href="#"><?=$item->getProductName()?></a><br/><span style="color:#252525;"><?= $this->translate("articleno") ?>: <?= $item->getProductnumber() ?></span></td>
        <td align="center"><strong><?= $product->getPrice()?></strong></td>
        <td align="center"><strong><?=$item->getAmount()?></strong></td>
        <td align="center"><strong><?=$item->getTotalPrice()?></strong></td>
    </tr>
    <?}?>

    <tr>
        <td style="border-top: 1px solid #1FA6E0;" align="right" colspan="3"><strong><?=$this->translate('cart.subtotal')?></strong></td>
        <td style="border-top: 1px solid #1FA6E0;font-size: 12px;" align="center" ><strong><?=$this->cart->getPriceCalculator()->getSubTotal()?></strong></td>
    </tr>


    <?php foreach ($this->cart->getPriceCalculator()->getPriceModifications() as $name => $modification) { ?>
        <tr>
            <td style="" align="right" colspan="3"><?=$this->translate('shop.cart.modification' . $name)?></td>
            <td style="font-size: 12px;" align="center" ><?=$modification?></td>
        </tr>
    <?php } ?>

    <tr>
        <td style="border-top: 1px solid #1FA6E0;" align="right" colspan="3"><strong><?=$this->translate('cart.grandtotal')?></strong></td>
        <td style="border-top: 1px solid #1FA6E0;font-size: 18px; color: #596068;" align="center" ><strong><?=$this->cart->getPriceCalculator()->getGrandTotal()?></strong></td>
    </tr>

    <?php if($this->paymentInfo) { ?>
        <tr>
            <td style="border-top: 1px solid #1FA6E0;" align="right" colspan="4"><?=$this->translate('cart.paymentinfo')?>: <?= $this->paymentInfo ?></td>
        </tr>
    <?php } ?>


</table>

<!-- VERSANDINFOS -->

<table width="700" class="content-table" border="0" cellpadding="2" cellspacing="0">
    <tr>
        <td align="left" valign="middle" bgcolor="#ffffff"  class="orange" colspan="2" style="color:#596068;font-weight: bold; text-transform: uppercase;"><?=$this->translate('checkout.order-information')?></td>

    </tr>
    <tr>
        <td align="left" valign="top" style="padding-top:5px; vertical-align: top;" bgcolor="#f3f3f3" width="200" class="left"><strong><?=$this->translate("checkout.delivery-address")?></strong></td>
        <td bgcolor="#f3f3f3" class="left">
            <?=$this->order->getDeliveryAddressLine1() . ' ' . $this->order->getDeliveryAddressLine2()?><br/>
            <?=$this->order->getDeliveryAddressLine4()?><br/>
            <?=$this->order->getDeliveryAddressLine5()?> <?=$this->order->getDeliveryAddressLine6()?><br/>
            <?=Zend_Locale::getTranslation( $this->order->getDeliveryAddressLine7(),'Country')?><br/>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle" bgcolor="#f3f3f3" class="left"><strong><?=$this->translate('checkout.your-ordernumber')?></strong></td>
        <td bgcolor="#f3f3f3" class="left"><?=$this->order->getOrdernumber()?></td>
    </tr>
    <!--<tr>
        <td align="center" valign="middle" bgcolor="#f3f3f3" class="left"><strong><?=$this->translate('checkout.order-comment')?></strong></td>
        <td bgcolor="#f3f3f3" class="left"><?=nl2br($this->escape($this->order->getCustomerOrderData()))?></td>
    </tr>-->
</table>
<?} else {?>
<table width="700" class="content-table" border="0" cellpadding="5" cellspacing="0"><tr><td style="padding: 10px; background-color:#ccc;">Hier stehen die E-Mail-Daten</td></tr></table>
<?}?>