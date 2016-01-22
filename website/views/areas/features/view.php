
<div class="row feature_box style2">
    <div class="span9">
        <h4 class="smallm_title centered bigger"><span><?= $this->input("headline", array("width" => 500)) ?></span></h4>
    </div>
    <?php for($i=1; $i<=3; $i++) { ?>
        <div class="span3">
            <?php while($this->block("items_" . $i)->loop()) { ?>
                <div class="box">
                    <span class="icon">
                        <?php
                            $config = array();
                            if($this->editmode) {
                                $config["width"] = 36;
                                $config["height"] = 36;
                            }
                        ?>
                        <?= $this->image("icon", $config); ?>
                    </span>
                    <h4 class="title"><?= $this->input("headline") ?></h4>
                    <p><?= $this->textarea("content") ?></p>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
