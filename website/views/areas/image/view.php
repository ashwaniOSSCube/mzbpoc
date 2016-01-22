
<div class="row">
    <div class="span9">
        <?php if($this->editmode) { ?>
            <?= $this->image("image", array("thumbnail" => "contentimage")) ?>
        <?php } else { ?>
            <a data-rel="prettyPhoto" rel="prettyPhoto[contentimage]" href="<?= $this->image("image")->getThumbnail("gallery-lightbox"); ?>" title="<?= $this->image("image")->getText(); ?>" class="hoverBorder">
                <?php $thumbnail = $this->image("image")->getThumbnail("contentimage"); ?>
                <img src="<?php echo $thumbnail; ?>"/>

            </a>
        <?php } ?>
    </div>
</div>
