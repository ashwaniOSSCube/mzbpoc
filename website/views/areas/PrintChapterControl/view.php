
<?php if($this->editmode) { ?>

    <h3><?= $this->translate("print.katalog.chaptercontrol"); ?></h3>

        <?= $this->translate("print.katalog.mainchapter"); ?>: <?= $this->input("mainchapter"); ?>
        <?= $this->translate("print.katalog.subchapter"); ?>: <?= $this->input("subchapter"); ?>


<?php } else { ?>

    <?php if( $this->input("mainchapter")->getValue()) { ?>
        <div class="js-toc-mainchapter layout-headline-chaptertitle" rel="<?= $this->document->getProperty("print_katalog_chapterclass") ?>">
            <?= $this->input("mainchapter")->getValue()?>
        </div>
    <?php } ?>

    <?php if($this->input("mainchapter")->getValue() && $this->input("subchapter")->getValue()) { ?>
        <div class="layout-headline-seperator"> | </div>
    <?php } ?>

    <?php if( $this->input("subchapter")->getValue()) { ?>
        <div class="js-toc-subchapter layout-headline-chaptersubtitle">
            <?= $this->input("subchapter")->getValue()?>
        </div>
    <?php } ?>


<?php } ?>

