<div class="row">

    <?php for($i=1; $i<=2; $i++) { ?>
        <div class="span<?= $i+3 ?>">
            <h3 class="m_title"><?= $this->input("headline_" . $i) ?></h3>
            <?php if($this->editmode || !$this->image("image_" . $i)->isEmpty()) { ?>
                <?= $this->image("image_" . $i, array("thumbnail" => "contentteaser", "class" => "pull-right", "style" => "margin:0 0 10px 10px")) ?>
            <?php } ?>

            <?= $this->wysiwyg("content_" . $i) ?>
        </div>
    <?php } ?>
</div>
