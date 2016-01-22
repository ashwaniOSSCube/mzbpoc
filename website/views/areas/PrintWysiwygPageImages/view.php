<?php
/**
 * @var $this Pimcore_View
 * @var $brick Document_Tag_Area_Info
 */
$brick = $this->brick;

if (!(is_array($this->placeholder("__areas")->getValue()) and in_array($brick->getId(),$this->placeholder("__areas")->getValue()))) {
    $this->placeholder("__areas")->append($this->brick->getId());

    $this->headLink()->prependStylesheet(
        array(
            'href' => $brick->getPath() . '/area.css',
            'rel' => 'stylesheet',
            'media' => 'all',
            'type' => 'text/css'
        ));
}
?>

<?php if($this->editmode) { ?>

    <h3><?= $this->translate("print.wysiwyg"); ?></h3>

    <?= $this->translate("print.headline"); ?>: <?= $this->input("headline1"); ?>
    <?= $this->translate("print.headline2"); ?>: <?= $this->input("headline2"); ?>

    <?= $this->translate("print.content"); ?>: <?= $this->wysiwyg("content"); ?>

    <?php while ($this->block("images")->loop()) { ?>

        <div class="image">
            <?php echo $this->image("image",
                array(
                    "thumbnail" => "print_wysiwyg_image_right",
                    "width" => 300
                )
            ); ?>
        </div>
    <?php } ?>



<?php } else { ?>

    <?php if( $this->input("headline1")->getValue()) { ?>
        <!--<div class="layout-headline-chaptertitle"><?= $this->input("headline1")->getValue()?> <?= $this->input("headline2")->getValue() ? "|" : "" ?> </div>-->
        <?php } ?>
    <?php if( $this->input("headline2")->getValue()) { ?>
        <!--<div class="layout-headline-chaptersubtitle"><?= $this->input("headline2")->getValue()?></div>-->
    <?php } ?>

    <div class="contenttype wysiwyg">

        <h1><?= $this->input("headline1"); ?></h1>
        <h2><?= $this->input("headline2"); ?></h2>

        <div class="contentblock">

            <div class="content"><?= $this->wysiwyg("content"); ?></div>

            <div class="images">
                <?php while ($this->block("images")->loop()) { ?>

                    <div class="image">
                        <?php echo $this->image("image",
                        array(
                            "thumbnail" => "print_wysiwyg_image_right"
                        )
                    ); ?>
                    </div>
                <?php } ?>
            </div>



            <div class="clear"></div>
        </div>


    </div>



<?php } ?>

