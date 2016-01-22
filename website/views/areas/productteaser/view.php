
<div class="row">
    <?php while($this->block("teaserblock")->loop()) { ?>

        <?php echo $this->renderlet("productteaser", array(
            "controller" => "shop",
            "action" => "product-cell",
            "editmode" => $this->editmode,
            "title" => "Drag a product here",
            "height" => 370,
            "width" => 270
        )); ?>

    <?php } ?>
</div>