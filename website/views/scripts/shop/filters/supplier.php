<div class="filterSection gradient js_filterparent">
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" rel="<?= OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING ?>" value="<?= $this->currentValue ?>" />
    <strong><?= $this->translate("general.filters." . $this->label) ?>/strong>
    <?php if(empty($this->currentValue)) { ?>
    <ul class="filterList js_options">
        <?php foreach ($this->values as $value) { ?>
            <?php $object = $this->objects[$value['value']] ?>
            <?php if($object && $object->isPublished()) { ?>
                <li>
                    <a href="#" class="js_optionfilter_option" rel="<?= $value['value'] ?>">
                        <?= $object->getMainName() ?> (<?= $value['count'] ?>)
                    </a>
                </li>
            <?php } ?>
        <?php } ?>
    </ul>
    <span class="filterItem js_icon"><a class="reset" href="#">reset</a><span class="js_curent_selection_text"></span></span>
    <?php } else { ?>
        <span class="filterItem js_icon js_reset_filter"><a class="reset" href="#">reset</a><span class="js_curent_selection_text"><?= $this->objects[$this->currentValue] ? $this->objects[$this->currentValue]->getMainName()  : "" ?></span></span>
    <?php } ?>

</div>
