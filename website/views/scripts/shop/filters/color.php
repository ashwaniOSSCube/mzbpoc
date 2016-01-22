<div class="filterSection gradient js_filterparent">
    <input class="js_optionvaluefield" type="hidden" name="<?= $this->fieldname ?>" value="<?= $this->currentValue ?>" />
    <strong><?= $this->translate("general.filters." . $this->label) ?></strong>
    <?php if(empty($this->currentValue)) { ?>
        <ul class="colorFilter js_options">
            <?php foreach($this->values as $value) { ?>
                <li>
                    <a href="#" class="js_optionfilter_option color<?= $value['value'] ?>" rel="<?= $value['value'] ?>"><?= $value['value'] ?></a>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <ul class="colorFilter">
            <li>
                <span class="filterItem js_icon js_reset_filter"><a class="reset" href="#">reset</a><a class="color<?= $this->currentValue; ?>"><?= $this->currentValue ?></a></span>
            </li>
        </ul>
    <?php } ?>
</div>