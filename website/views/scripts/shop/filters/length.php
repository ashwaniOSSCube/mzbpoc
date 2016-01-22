<div class="filterSection gradient js_filterparent">
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" rel="<?= OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING ?>" value="<?= $this->currentValue ?>" />
    <strong><?= $this->translate("general.filters." . $this->label) ?></strong>
    <?php if(empty($this->currentValue)) { ?>
        <ul class="filterList js_options">

            <?php //p_r($this->values); die(); ?>

            <?php foreach ($this->values as $value) { ?>
                <?php if(!empty($value['from']) || !empty($value['to'])) { ?>
                    <li>
                        <a href="#" class="js_optionfilter_option" rel="<?= $value['from'] . "-" . $value['to'] ?>">
                            <?php if (empty($value['from'])) { ?>
                                <?= $this->translate("optionvalue.less") ?> <?= $value['to'] ?> <?= $value['unit'] ?>
                            <?php } elseif (empty($value['to'])) { ?>
                                <?= $this->translate("optionvalue.more") ?> <?= $value['from'] ?> <?= $value['unit'] ?>
                            <?php } else { ?>
                                <?= $value['from'] ?> - <?= $value['to'] ?> <?= $value['unit'] ?>
                            <?php } ?>
                        </a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
        <span class="filterItem js_icon"><a class="reset" href="#">reset</a><span class="js_curent_selection_text"></span></span>
    <?php } else { ?>
        <span class="filterItem js_icon js_reset_filter"><a class="reset" href="#">reset</a><span class="js_curent_selection_text"><?= $this->currentNiceValue ?>  <?= $this->unit ?></span></span>
    <?php } ?>

</div>
