
<div class="row services_box">
    <?php for($i=1; $i<=3; $i++) { ?>
        <div class="span3">
            <div class="box fixclear">
                <div class="icon">
                    <?php
                        $config = array();
                        if($this->editmode) {
                            $config["width"] = 80;
                            $config["height"] = 80;
                        }
                    ?>
                    <?= $this->image("icon_" . $i, $config); ?>
                </div>
                <h4 class="title"><?= $this->input("headline_" . $i) ?></h4>
                <ul class="list-style1">
                    <?php while($this->block("items_" . $i)->loop()) { ?>
                        <li><?= $this->input("item_" . $i) ?></li>
                    <?php } ?>
                </ul>
            </div><!-- end box -->
        </div>
    <?php } ?>
</div>
