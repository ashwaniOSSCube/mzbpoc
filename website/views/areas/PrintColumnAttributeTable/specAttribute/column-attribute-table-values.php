<?php
    $count = 0;
    $totalCount = count($this->configArray);
?>

<?php foreach($this->elements as $element) { ?>
    <?php if(!$this->subgroup) { ?>
        <tr class=" <?= ($count % 2 == 0) ? 'even' : '' ?>">
    <?php } ?>
        <?php $isFistColumn = true; ?>
        <?php foreach($this->configArray as $configElement) { ?>

        <?php
            $cssClasses = "";
            $cellStyles = "";
            if($configElement instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\CellFormater) {
                $cssClasses = $configElement->getCssClass();
                $cellStyles = $configElement->getStyles();
            }
        ?>

            <?php if($configElement instanceof Elements\OutputDataConfigToolkit\ConfigElement\Operator\Group) { ?>
                <?= $this->partial("/specAttribute/column-attribute-table-values.php",
                    array("configArray" => $configElement->getChilds(), "elements" => array($element), "subgroup" => $this->subgroup + 1));
                ?>
            <?php } else { ?>
                <?php if($element instanceof Document_Tag_Outputchanneltable_MetaEntry_Default) { ?>
                    <?php if($element->getSpan()) { ?>
                        <?php if($isFistColumn && !$this->subgroup) { ?>
                            <td class="metaentry <?= $cssClasses ?>" style="<?= $cellStyles ?>" colspan="<?=$totalCount ?>"><?= $element->getValue() ?></td>
                        <?php } ?>
                    <?php } else { ?>
                        <td class="metaentry <?= $cssClasses ?>" style="<?= $cellStyles ?>"><?= $element->getValue() ?></td>
                    <?php } ?>
                <?php } else if($element instanceof Document_Tag_Outputchanneltable_MetaEntry_Table) { ?>
                    <?php
                        if($isFirst && !$this->subgroup) {
                            $element->resetNextValue();
                        }
                        $value = $element->getNextValue();
                    ?>
                    <?php if($value) { ?>
                        <td colspan="<?=$value['span'] ?>"><?= $value['value'] ?></td>
                    <?php } ?>
                <?php } else { ?>
                    <td class="<?= $cssClasses ?>" style="<?= $cellStyles ?>">
                        <?php $outputElement = $configElement->getLabeledValue($element); ?>
                        <?= $this->partial("/specAttribute/spec-value.php",
                                            array("outputElement" => $outputElement, "thumbnailName" => $this->thumbnailName))
                        ?>
                    </td>
                <?php } ?>
            <?php } ?>
            <?php $isFistColumn = false; ?>
        <?php } ?>

    <?php if(!$this->subgroup) { ?>
        </tr>
        <?php $count++ ?>
    <?php } ?>
<?php } ?>
