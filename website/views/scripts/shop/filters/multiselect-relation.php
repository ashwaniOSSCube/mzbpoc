<?if(sizeof($this->values)) {?>

    <?php
        if(empty($this->currentValue)) {
            $this->currentValue = array();
        }
    ?>

    <div class="filter">
        <h4 class="title"><?= $this->translate("general.filters." . $this->label) ?></h4>

        <ul class="filterList_" style="margin: 0px; list-style: none; padding: 0px;">
            <?php foreach($this->values as $value) { ?>
                <?php
                    $checked = in_array($value['value'], $this->currentValue);
                    $checkedClass = $checked ? 'checked' : '';

                    $label = $checked ? '<b>%s</b>' : '%s';
                    $label = sprintf($label, sprintf("%s (%s)", $value['value'], $value['count'] ));
                ?>
                <li>
                    <div class="checkbox <?= $checkedClass ?> js_filterparent">
                    <span class="checkbox-icon icon- icon-fixed-width">
                        <input type="checkbox" value="<?= $value['value'] ?>" <?= $checked ? 'checked="checked"' : '' ?> class="filter checkBox" name="<?= $this->fieldname ?>[]">
                    </span>
                        <label class="checkbox-label js_optionfilter_option"><?= $this->objects[$value['value']]->getName() ?> (<?= $value['count'] ?> )</label>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>

<?}?>