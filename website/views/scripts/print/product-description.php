<?php

/**
 * @var $product Object_Product
  */
$product = $this->product;

$thumbnail = "print_katalog_productdescription";
$description = $product->getDescription();

if($this->showVariantTable) {
    $colorVariants = $product->getColorVariants();
}

?>

<div class="js-toc-subchapter layout-headline-chaptersubtitle"><?= $product->getName() ?></div>

<div class="contenttype wysiwyg image productdescription">

    <div class="texts">
        <h1><?= $product->getName() ?></h1>
        <h2><?= $product->getCategoriesText() ?></h2>
        <div class="text">
            <?= $description ?>
        </div>
    </div>


    <div class="productimage">
        <?php if($image = $product->getFirstImage($thumbnail)) { ?>
            <img src="<?= $image ?>" />
        <?php } ?>
    </div>

    <div style="clear: both"></div>


    <?php if($this->showVariantTable && $colorVariants) { ?>

        <br/>
        <h2><?= $this->translate("print.description.variants") ?></h2>

        <table class="basetable">
            <thead>
                <tr>
                    <td style="width: 20%"><?= $this->translate("print.description.name") ?></td>
                    <td style="width: 60%"><?= $this->translate("print.description.colors") ?></td>
                    <td><?= $this->translate("print.description.image") ?></td>
                </tr>
            </thead>

            <tbody>
                <?php foreach($colorVariants as $variant) { ?>
                    <tr>
                        <td><?= $variant->getName() ?></td>
                        <td><?= $variant->getColorName() ?></td>
                        <td class="align-center"><img class="image" src="<?= $variant->getFirstImage("print_image_small") ?>" /> </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>

    <?php } ?>

</div>
