
<?php while($this->block("gallery")->loop()) { ?>
    <div class="acc-group style3">
        <button <?php if(!$this->editmode) { ?>data-toggle="collapse"<?php } ?> data-target="#<?= $this->input("headline")->getName() ?>" class="collapsed">
            <?= $this->input("headline"); ?>
        </button>
        <div id="<?= $this->input("headline")->getName() ?>" <?php if(!$this->editmode) { ?>class="collapse in"<?php } ?>>
            <div class="content">
                <?= $this->wysiwyg("content"); ?>
            </div>
        </div>
    </div>
<?php } ?>
