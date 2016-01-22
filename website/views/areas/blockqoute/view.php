
<h5><?= $this->input("headline") ?></h5>

<?php while($this->block("quotes")->loop()) { ?>
    <blockquote>
        <p><?= $this->input("quote") ?></p>
        <small><?= $this->input("hint") ?></small>
    </blockquote>
<?php } ?>
