<?php
    $brick = $this->brick;
?>

<div>

    <?php if($this->editmode) { ?>
        <h3><?= $this->translate("print.katalog.productdescription"); ?></h3>

        <?= $this->translate("print.katalog.mainchapter"); ?>: <?= $this->input("mainchapter"); ?> <br/>

    <?php } else { ?>
        <?php if($this->input("mainchapter")->getValue()) { ?>
            <a class="js-toc-mainchapter layout-headline-chaptertitle" rel="<?= $this->document->getProperty("print_katalog_chapterclass") ?>"><?= $this->input("mainchapter")->getValue() ?></a>
        <?php } ?>
        <?php if($this->input("mainchapter")->getValue()) { ?>
            <div class="layout-headline-seperator"> | </div>
        <?php } ?>

    <?php } ?>



    <?php
        echo $this->renderlet("renderlet", array(
            "locale" => Zend_Registry::get("Zend_Locale")->__toString(),
            "controller" => "print",
            "action" => "product-description",
            "title" => "Drop product object here",
            "editmode" => $this->editmode,
            "variants" => true,
            "width" => "100%",
            "height" => 200
        ));
    ?>
</div>
