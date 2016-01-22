

<h3 class="m_title"><?= $this->input("headline") ?></h3>

<?php
$block = $this->block("list");
while ($block->loop()) { ?>
    <div class="process_box" data-align="left">
        <div class="number"><span><?= $block->getCurrent()+1 ?></span></div>
        <div class="content">
            <?= $this->wysiwyg("content") ?>
        </div>
        <div class="clear"></div>
    </div><!-- end process box -->
<?php } ?>