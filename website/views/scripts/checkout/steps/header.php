<?php

    $hrefCart = $this->url(array("action" => "list"), "cart");
    $hrefDelivery = "#";
    $hrefConfirm = "#";
    $hrefPayment = "#";

    if($this->step == 'delivery') {
        $hrefDelivery = $this->url(array("action" => "delivery"), "checkout");
    }

    if($this->step == 'confirm') {
        $hrefDelivery = $this->url(array("action" => "delivery"), "checkout");
        $hrefConfirm = $this->url(array("action" => "confirm"), "checkout");
    }

    if($this->step == 'payment') {
        $hrefDelivery = $this->url(array("action" => "delivery"), "checkout");
        $hrefConfirm = $this->url(array("action" => "confirm"), "checkout");
        $hrefPayment = $this->url(array("action" => "payment"), "checkout");
    }

?>

<div class="row">
    <div class="span12">
        <div class="process_steps cart fixclear">
            <div class="step <?= $this->step == 'cart' ? 'active' : '' ?>">
                <a href="<?= $hrefCart ?>"><h5><?= $this->translate("checkout.steps.cart") ?></h5></a>
            </div>
            <div class="step <?= $this->step == 'delivery' ? 'active' : '' ?>">
                <a href="<?= $hrefDelivery ?>"><h5><?= $this->translate("checkout.steps.shipping") ?></h5></a>
            </div>
            <div class="step <?= $this->step == 'confirm' ? 'active' : '' ?>">
                <a href="<?= $hrefConfirm ?>"><h5><?= $this->translate("checkout.steps.confirm") ?></h5></a>
            </div>
            <div class="step <?= $this->step == 'payment' ? 'active' : '' ?>">
                <a href="<?= $hrefPayment ?>"><h5><?= $this->translate("checkout.steps.payment") ?></h5></a>
            </div>
            <div class="step <?= $this->step == 'completed' ? 'active' : '' ?>">
                <h5><?= $this->translate("checkout.steps.completed") ?></h5>
            </div>
        </div>

    </div>
</div>