<?php if(!is_object($this->outputElement->value)) { ?>

    <?php
        if($this->outputElement->def instanceof Object_Class_Data_Select) {
            $value = $this->translateAdmin($this->outputElement->value);
        } else {
            $value = $this->outputElement->value;
        }
    ?>
    <?php
        if(is_array($value)) {
            $valueArray = array();
            foreach($this->outputElement->value as $v) {
                $translatedValue = $this->translate("optionvalue." . $v);
                if($translatedValue == "optionvalue." . $v) {
                    $translatedValue = $this->translate($v);
                }
                $valueArray[] = $this->translate($translatedValue);
            }
            $value = implode(", ", $valueArray);
        }
    ?>

    <?= $value ?>

<?php } else if($this->outputElement->value instanceof Object_Data_DimensionUnitField) { ?>
    <?php
        $value = $this->outputElement->value->getValue();
        $dimension = $this->outputElement->value->getUnit()->getAbbreviation();
    ?>

    <span class="unit"><?= $dimension ?></span>
    <?= $value ?>
<?php } else if($this->outputElement->value instanceof Asset_Image) { ?>

    <img src="<?= $this->outputElement->value->getThumbnail($this->thumbnailName)?>" class="image" />

<?php } else if($this->outputElement->value instanceof Object_Data_StructuredTable) { ?>
    <?php
        $cols = array();
        $colKeys = array();
        foreach($this->outputElement->def->getCols() as $c) {
            $cols[] = $this->view->translateAdmin($c["label"]);
            $colKeys[] = $c["key"];
        }

        $rows = array();
        $rowKeys = array();
        foreach($this->outputElement->def->getRows() as $r) {
            $rows[] = $this->view->translateAdmin($r["label"]);
            $rowKeys[] = $r["key"];
        }

        $value = $this->outputElement->value;
    ?>

    <table class="table">
        <tr class="subTableHeader">
            <th></th>
            <?php foreach($cols as $c) { ?>
            <td class="txtCenter width80"><?= $c ?></td>
            <?php } ?>
        </tr>

        <?php foreach($rows as $i => $r) { ?>

        <tr>
            <td class="subTableHeader">
                <?= $r ?>
            </td>

            <?php foreach($colKeys as $c) { ?>
                <?php
                    $rKey = $rowKeys[$i];
                    $getter = "get" . $rKey . "__" . $c;
                ?>

                <td class="txtCenter"><?= $value->$getter()?></td>
            <?php } ?>

        </tr>
        <?php } ?>

    </table>
<?php } ?>