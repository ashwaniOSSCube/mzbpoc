

<ul class="photo_gallery addcaption">

    <?php
    $block = $this->block("gallery");
    while($block->loop()) { ?>
        <li>
            <a data-rel="prettyPhoto" rel="prettyPhoto[<?= $block->getName() ?>]" href="<?= $this->image("image")->getThumbnail("gallery-lightbox"); ?>" title="<?= $this->image("image")->getText(); ?>" class="hoverBorder">
                <?= $this->image("image", array("thumbnail" => "gallery-preview", "width" => 155, "height" => 115)); ?>
            </a>
        </li>
    <?php } ?>

</ul>
