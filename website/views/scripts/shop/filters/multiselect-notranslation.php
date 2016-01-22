<?php
// ...
if(empty($this->currentValue))
{
    $this->currentValue = array();
}

//
$values = array();
foreach($this->values as $value)
{
    if(!empty($value['value']))
        $values[] = $value;
}

// if now values available, skip this filter
if(count($values) === 0)
{
    return;
}
?>
<div class="filter">
    <h4 class="title"><?= $this->translate("general.filters." . $this->label) ?></h4>

    <ul class="filterList_" style="margin: 0px; list-style: none; padding: 0px;">
        <?php
        foreach($values as $value):
            $checked = in_array($value['value'], $this->currentValue);
            $checkedClass = $checked ? 'checked' : '';
            $id = 'filter' . md5($this->fieldname.$value['value']);

            $label = $checked ? '<b>%s</b>' : '%s';
            $label = sprintf($label, sprintf("%s (%s)", $value['value'], $value['count'] ));
            ?>
            <li>
                <div class="checkbox <?= $checkedClass ?> js_filterparent">
                    <span class="checkbox-icon icon- icon-fixed-width">
                        <input type="checkbox" value="<?= $value['value'] ?>" <?= $checked ? 'checked="checked"' : '' ?> class="filter checkBox" name="<?= $this->fieldname ?>[]">
                    </span>
                    <label class="checkbox-label js_optionfilter_option"><?= $label ?></label>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
