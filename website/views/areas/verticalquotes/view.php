
<h5><?= $this->input("headline") ?></h5>

<div class="row">
    <?php for($i=1; $i<=3; $i++) { ?>
        <div class="span3">
            <div class="testimonial_box4">
                <blockquote><?= $this->textarea("quote__" . $i) ?></blockquote>
                <h5><?= $this->input("hint_" . $i) ?></h5>
            </div>
        </div>
    <?php } ?>

</div>