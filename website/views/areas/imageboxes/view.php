
<div class="row image-boxes imgboxes_style1">
    <?php for($i=1; $i<=3; $i++) { ?>
        <div class="span3 box">
            <a href="#" class="hoverBorder">
                <?php
                    $config = array("thumbnail" => "imagebox");
                    if($this->editmode) {
                        $config["width"] = 280;
                        $config["height"] = 170;
                    }
                ?>
                <?= $this->image("image_" . $i, $config) ?>
                <h6><?= $this->translate("Read more") ?></h6>
            </a>
            <h3 class="m_title"><?= $this->input("headline_" . $i) ?></h3>
            <p><?= $this->textarea("content__" . $i) ?></p>
        </div>
    <?php } ?>
</div>
