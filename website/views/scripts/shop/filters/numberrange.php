<?php

// if now values available, skip this filter
if(count($this->values) === 0)
{
    return;
}
?>
<div class="filterSection numberrange js_filterparent">
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" rel="<?= OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING ?>" value="<?= $this->currentValue ?>" />

    <h4 class="title"><?= $this->translate(trim("general.filters." . $this->label)) ?></h4>
    <?php if(empty($this->currentValue)) { ?>
        <ul class="menu  filterList js_options">
            <?php foreach ($this->values as $value) { ?>
                <li>
                    <a href="#" class="js_optionfilter_option" rel="<?= $value['from'] . "-" . $value['to'] ?>">
                        <?= $value['label'] ?> <?= $value['unit'] ?> (<?= $value['count'] ?>)
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <ul class="menu filterList js_options">
            <li class="js_curent_selection_text">
                <a><?= $this->currentNiceValue ?>  <?= $this->unit ?></a>
            </li>
        </ul>
        <span class="filterItem js_icon js_reset_filter"><a class="reset" href="#"><?= $this->translate("reset") ?></a></span>
    <?php } ?>

</div>

