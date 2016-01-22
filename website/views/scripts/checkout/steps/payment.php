<h1 class="page-title"><?= $this->translate("checkout.payment.ttl") ?></h1>

<?php if(count($this->errors)): ?>
    <div class="alert alert-error">
        <?php foreach($this->errors as $error): ?>
            <p><?= $this->translate("checkout.error.payment." . $error) ?></p>
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

<div id="checkout-payment">

    <iframe src="<?= $this->url(array('action' => 'payment-frame', 'controller' => 'checkout')); ?>" frameborder="0" scrolling="auto" style="width: 100%; height: 900px; border: 0px;"></iframe>

</div>