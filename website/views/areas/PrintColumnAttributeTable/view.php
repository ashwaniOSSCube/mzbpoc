<?php if($this->editmode) { ?>
    <h4><?php echo $this->input("headline") ?></h4>
    <p><?php echo $this->textarea("headtext") ?></p>

    <?php echo $this->demooutputchanneltable("tableconfig") ?>
<?php } else { ?>

    <div class="headline">
        <h4><?php echo $this->input("headline") ?></h4>
        <p><?php echo $this->textarea("headtext") ?></p>
    </div>
    <?php
        $configArray = array();
        if($this->demooutputchanneltable("tableconfig")->getOutputChannel()) {
            $configArray = Elements\OutputDataConfigToolkit\Service::buildOutputDataConfig($this->demooutputchanneltable("tableconfig")->getOutputChannel());
        }
        ?>
    <table class="basetable">
        <?= $this->partial("/specAttribute/column-attribute-table.php",
            array("configArray" => $configArray,
                  "classname" => "Object_" . $this->demooutputchanneltable("tableconfig")->getSelectedClass(),
                  "elements" => $this->demooutputchanneltable("tableconfig"),
                  "thumbnailName" => "print_image_small"
            )
            ); ?>
    </table>

<?php } ?>