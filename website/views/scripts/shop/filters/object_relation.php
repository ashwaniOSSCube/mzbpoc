<?php

    $values = $this->values;

    @usort($values, function($left, $right) {

        $object = Object_Abstract::getById($left["value"]);
        if($object) {
            $nameLeft = $object->getName();
        }

        $object = Object_Abstract::getById($right["value"]);
        if($object) {
            $nameRight = $object->getName();
        }

        return strcmp($nameLeft, $nameRight);

    });


    $currentObject = Object_Abstract::getById($this->currentValue);



?>



<div class="filterSection gradient js_filterparent">
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" rel="<?= OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING ?>" value="<?= $this->currentValue ?>" />
    <h4 class="title"><?= $this->translate("general.filters." . $this->label) ?></h4>
    <?php if(empty($this->currentValue)) { ?>
        <ul class="menu filterList js_options">
            <?php foreach ($values as $value) { ?>
                <?php $object = $this->objects[$value['value']] ?>
                <?php if($object && $object->isPublished()) { ?>
                    <li>
                        <a href="#" class="js_optionfilter_option" rel="<?= $value['value'] ?>">
                            <?= $object->getName() ?> (<?= $value['count'] ?>)
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <ul class="menu filterList js_options">
            <li class="js_curent_selection_text">
                <a><?= $currentObject->getName() ?></a>
            </li>
        </ul>
        <span class="filterItem js_icon js_reset_filter"><a class="reset" href="#"><?= $this->translate("reset") ?></a></span>
    <?php } ?>

</div>
