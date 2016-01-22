<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 17.05.13
 * Time: 13:20
 * To change this template use File | Settings | File Templates.
 */
$order = $this->order;
/* @var OnlineShop_Framework_AbstractOrder $order */
?>
<div class="container">
    <div id="mainbody">
        <?= $this->partial("checkout/steps/header.php", array("step" => 'completed')) ?>

        <h3><?= $this->translate("checkout.completed.ttl") ?></h3>
        <p><?= $this->translate("checkout.completed.txt") ?></p>

        <p><b><?= $this->translate("checkout.completed.ordernumber") ?>: <?= $order->getOrdernumber() ?></b></p>
        <ul id="checkout-list">
        <?php foreach($order->getItems() as $item): ?>
            <li class="checkout-list-item">
                <img class="checkout-list-item-image" src="<?= $item->getProduct()->getFirstImage(array('width' => 120, 'height' => 120, 'aspectratio' => true)) ?> " alt="" border="0" />
                <p class="checkout-list-item-title"><?= $item->getProduct()->getOSName() ?></p>
            </li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>


<?php if(!empty($this->gacodeUniversal)) { ?>

    <script type="text/javascript">
        <?= $this->gacodeUniversal ?>
    </script>

<?php } ?>