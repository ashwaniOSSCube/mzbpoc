<?php
    $block = $this->block("tabs");
?>
<div class="vertical_tabs">
    <div class="tabbable">
        <ul class="nav fixclear">
            <?php while($block->loop()) { ?>
                <li<?php if($block->getCurrent() == 0) { ?> class="active"<?php } ?>>
                    <?php if(!$this->editmode) { ?>
                        <a href="#<?= $block->getName() . $block->getCurrent() ?>" data-toggle="tab">
                            <span><span class="<?= $this->select("icon") ?> icon-white"></span></span>
                            <?= $this->input("label") ?>
                        </a>
                    <?php } else { ?>
                        <a href="#<?= $block->getName() . $block->getCurrent() ?>" data-toggle="tab">Edit Content</a>
                        <?= $this->input("label") ?>
                        <?= $this->select("icon",array(
                            "store" => array(
                                array("icon-comment", "Comment"),
                                array("icon-book", "Book"),
                                array("icon-tint", "Tint")
                            )
                        )); ?>
                    <?php } ?>
                </li>
            <?php } ?>
        </ul>
        <div class="tab-content">
            <?php
                $block->setEditmode(false);
            ?>
            <?php while($block->loop()) { ?>
                <div class="tab-pane <?php if($block->getCurrent() == 0) { ?>active<?php } ?>" id="<?= $block->getName() . $block->getCurrent() ?>">
                    <h4><?= $this->input("headline", array("width" => 600)) ?></h4>
                    <?= $this->image("image", array("class" => "pull-right", "thumbnail" => "verticaltabs", "style" => "margin:0 0 0 15px;")) ?>

                    <?= $this->wysiwyg("content", array("width" => 600)); ?>
                </div>
            <?php } ?>
        </div>
        <!-- /.tab-content -->
    </div>
    <!-- /.tabbable -->
</div>