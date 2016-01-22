<?php
$customer = $this->customer;
/* @var Object_Customer $customer */
?>

<form action="<?= $this->url(array('action' => 'delivery'), 'checkout') ?>" method="post">
    <h1 class="page-title"><?= $this->translate("checkout.deliveryaddress") ?></h1>

    <?php if(count($this->errors)): ?>
        <div class="alert alert-error">
            <?php foreach($this->errors as $error): ?>
                <p><?= $this->translate("checkout.error.delivery." . $error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if($customer && ($addresses = $customer->getDeliveryAddress())): ?>
        <div class="checkout-address-book">
            <?php foreach($addresses as $address): ?>
                <div class="address-book-entry">
                    <b><?= $address->getFirstname('de') . ' ' . $address->getLastname() ?></b><br/>
                    <?php
                    if($address->getCompany())
                        echo $address->getCompany() . '<br />';
                    ?>
                    <?= $address->getAddress() ?><br/>
                    <?= $address->getZip() . ' ' . $address->getCity() ?><br/>
                    <?= Zend_Locale::getTranslation($address->getCountry(), 'Country') ?><br/>

                    <div class="buttons">
                        <input type="submit" name="address_<?= $address->getId() ?>" value="deliver to this address" class="btn btn-small btn-primary" style="width: 170px; margin-bottom: 5px;" />
                        <!--<a href="#" class="btn btn-mini" style="width: 70px;">edit</a>
                        <a href="#" class="btn btn-mini" style="width: 70px;">delete</a>-->
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="checkout-address-add">
        <?php $deliveryAddress = $this->deliveryAddress->getData() ?>
        <h4 class="title"><?= $customer ? $this->translate("checkout.other_address") : $this->translate("checkout.address") ?></h4>
        <table>
            <tbody>
            <?php if(!$customer) { ?>
                <tr>
                    <td width="100"class="<?= in_array('email', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.email") ?></label></td>
                    <td><input type="text" name="email" class="span3" value="<?= $deliveryAddress->email ? $deliveryAddress->email : $this->getParam('email') ?>" /></td>
                </tr>
            <?php } ?>
            <tr>
                <td width="100"class="<?= in_array('firstname', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.firstname") ?></label></td>
                <td><input type="text" name="shipping_firstname" class="span3" value="<?= $deliveryAddress->firstname ? $deliveryAddress->firstname : $this->getParam('shipping_firstname') ?>" /></td>
            </tr>
            <tr>
                <td width="100" class="<?= in_array('lastname', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.lastname") ?></label></td>
                <td><input type="text" name="shipping_lastname" class="span3" value="<?= $deliveryAddress->lastname ? $deliveryAddress->lastname : $this->getParam('shipping_lastname') ?>" /></td>
            </tr>
            <tr>
                <td width="100"class="<?= in_array('company', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.company") ?></label></td>
                <td><input type="text" name="shipping_company" class="span3" value="<?= $deliveryAddress->company ? $deliveryAddress->company :  $this->getParam('shipping_company') ?>" /></td>
            </tr>
            <tr>
                <td class="<?= in_array('address', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.address") ?></label></td>
                <td><input type="text" name="shipping_address" class="span3" value="<?= $deliveryAddress->address ? $deliveryAddress->address :  $this->getParam('shipping_address') ?>" /></td>
            </tr>
            <tr>
                <td class="<?= in_array('zip', $this->errors) || in_array('city', $this->errors) ? 'text-error':'' ?>"><label><?= $this->translate("checkout.zip_city") ?></label></td>
                <td>
                    <input type="text" name="shipping_zip" class="span1" value="<?= $deliveryAddress->zip ? $deliveryAddress->zip :  $this->getParam('shipping_zip') ?>" />
                    <input type="text" name="shipping_city" class="span2" value="<?= $deliveryAddress->city ? $deliveryAddress->city :  $this->getParam('shipping_city') ?>" />
                </td>
            </tr>
            <tr>
                <td><label><?= $this->translate("checkout.country") ?></label></td>
                <td>
                    <?php
                    $shippingCountry = array('at', 'de');
                    ?>
                    <select name="shipping_country" class="span3">
                        <?php foreach($shippingCountry as $country): ?>
                            <option <?= ($country == $this->getParam('shipping_country') || $country == $deliveryAddress->country) ? 'selected="selected"' : '' ?> value="<?= $country ?>" > <?= Zend_Locale::getTranslation(strtoupper($country), 'Country') ?></option>
                        <?php endforeach; ?>
                    </select>

                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <br>
    <input type="submit" class="btn btn-primary span4" value="<?= $this->translate("checkout.next") ?>" />
</form>