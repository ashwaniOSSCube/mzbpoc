<div class="process_steps fixclear">
    <?php for($i=1; $i<=4; $i++) { ?>
        <div class="step <?php if($i==1) { ?>intro<?php } else { ?>step<?php echo $i-1; } ?>">
            <?php if($i > 1) { ?>
                <div class="icon" data-animation="tada">
                    <?php
                        $config = $this->editmode ? array("width" => 70, "height" => 50) : array();
                    ?>
                    <?= $this->image("icon_" . $i, $config); ?>
                </div>
            <?php } ?>
            <h3><?= $this->input("headline_" . $i) ?></h3>
            <p><?= $this->textarea("text_" . $i) ?></p>
        </div>
    <?php } ?>
</div>