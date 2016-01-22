    <tr>
        <?php foreach($this->configArray as $configElement) { ?>

            <?php if($configElement instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\Group) { ?>

                <td colspan="<?=count($configElement->getChilds()) ?>">
                    <?php $classname = $this->classname;?>
                    <?= $configElement->getLabel() ?>
                </td>

                <?= $this->partial("/specAttribute/column-attribute-table-header.php",
                    array("configArray" => $configElement->getChilds(), "classname" => $this->classname, "levels" => $this->levels, "currentLevel" => $this->currentLevel + 1));
                ?>


            <?php } else { ?>

                <?php
                $cssClasses = "";
                $cellStyles = "";
                if($configElement instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\CellFormater) {
                    $cssClasses = $configElement->getCssClass();
                    $cellStyles = $configElement->getStyles();
                }
                ?>

                <td rowspan="<?= $this->levels - $this->currentLevel ?>" class="<?= $cssClasses ?>" style="<?= $cellStyles ?>">
                    <?php $classname = $this->classname;?>
                    <?= $configElement->getLabeledValue(new $classname())->label ?>
                </td>
            <?php } ?>
        <?php } ?>
    </tr>