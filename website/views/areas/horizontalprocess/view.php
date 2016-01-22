

<h3 class="m_title"><?= $this->input("headline") ?></h3>

    <div class="row">
<?php for($i=1; $i<=3; $i++) { ?>
    <div class="span3">
        <div class="gobox <?php if($i==3) { ?>ok<?php } ?>">
            <?php if($i==3) { ?>
            <img src="/static/images/ok.png" alt="">
            <?php } ?>
            <h4><?= $this->input("headline_" . $i) ?></h4>
            <p>
                <?= $this->textarea("text_" . $i) ?>
            </p>
        </div>
    </div>
<?php } ?>
    </div>