<?php if(count($this->errors)): ?>
    <div class="alert alert-error">
        <?php foreach($this->errors as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php $form = $this->payment ?>
<?php if($form instanceof Zend_Form) { ?>
    <p><img src="http://www.wirecard.at/fileadmin/wirecard/template/img/logo.jpg" /></p>

    <p><?= $this->translate('checkout.payment.txt') ?></p>

    <?php
        $form->setAttrib("id", "form1");
    $form->setName("form1");
        $form->setElementDecorators(array('ViewHelper'));
        $form->removeDecorator('HtmlTag');
        $form->getElement('submitbutton')->setAttrib('class', 'btn btn-primary')->setLabel( $this->translate('checkout.payment.paynow') );
        echo $form;
    ?>

    <script type="text/javascript">
        $(document).ready(function() {
            document.form1.submit();
        });
    </script>

<?php } else if($this->payment !== false) { ?>
    <a href=" <?= $this->payment ?>" target="_top"><img src="https://www.paypalobjects.com/webstatic/de_DE/i/de-btn-expresscheckout.gif" /></a>
<?php } ?>
