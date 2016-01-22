<?php

    $values = $this->values;

    foreach($values as &$modifyingValue) {
        $modifyingValue['translated'] = $this->translate('optionvalue.' . $modifyingValue['value']);
    }


    @usort($values, function($left, $right) {
        return strcmp($left['translated'], $right['translated']);

    });
?>
<div class="filterSection gradient js_filterparent">
    <h4 class="title"><?= $this->translate("general.filters." . $this->label) ?></h4>
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" rel="<?= OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING ?>" value="<?= $this->currentValue ?>" />
    <?php if(empty($this->currentValue)) { ?>
    <ul class="filterList js_options">
        <?php foreach ($values as $value) { ?>
            <?php if($value['value']) { ?>
                <li>
                    <a href="#" class="js_optionfilter_option" rel="<?= $value['value'] ?>">
                        <?= $value['translated'] ?> (<?= $value['count'] ?>)
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <?php } ?>
</div>
