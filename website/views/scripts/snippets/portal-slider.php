<?php if($this->editmode) { ?>
    <link rel="stylesheet" href="/static/css/editmode.css" type="text/css"/>

    <div id="slideshow">
        <div class="container">

            <?php while($this->block("items")->loop()) { ?>
                <div class="line">Main-Title: <?= $this->input("maintitle") ?></div>
                <div class="line">Big-Title: <?= $this->input("titlebig") ?></div>
                <div class="line">Small-Title: <?= $this->input("titlesmall") ?></div>

                <?= $this->image("title", array("width" => "400", "thumbnail" => "portalslider")) ?>

                <div class="line">
                    Style:
                    <?php echo $this->select("style",array(
                        "store" => array(
                            array("style1", "style1"),
                            array("style2", "style2"),
                            array("style3", "style3")
                        )
                    )); ?>
                </div>

                <div class="line">
                    Text-Orientation:
                    <?php echo $this->select("textorientation",array(
                        "store" => array(
                            array("", "Default"),
                            array("fromright", "From Right")
                        )
                    )); ?>
                </div>

            <?php } ?>

        </div>
    </div>


<?php } else { ?>

<div id="slideshow" class="gradient">

    <div class="iosSlider">

        <div class="slider">


            <?php while($this->block("items")->loop()) { ?>

                <div class="item">
                    <?= $this->image("title", array("thumbnail" => "portalslider")) ?>
                    <div class="caption <?= $this->select("style") ?> <?= $this->select("textorientation") ?>">
                        <h2 class="main_title"><?= $this->input("maintitle") ?></h2>

                        <h3 class="title_big"><?= $this->input("titlebig") ?></h3>
                        <a href="#" class="more"><img src="/static/sliders/iosslider/arr01.png" alt=""></a>
                        <h4 class="title_small"><?= $this->input("titlesmall") ?></h4>
                    </div>
                </div>
                <!-- end item -->

            <?php } ?>

        </div>

        <div class="prev">
            <div class="btn-label">PREV</div>
        </div>

        <div class="next">
            <div class="btn-label">NEXT</div>
        </div>

        <div class="selectorsBlock bullets">
            <div class="selectors">
                <?php while($this->block("items")->loop()) { ?>
                    <div class="item"></div>
                <?php } ?>
            </div>
        </div>

    </div>
    <!-- end iosSlider -->
    <div class="scrollbarContainer"></div>
</div>
<!-- end slideshow -->

<!--
<div id="action_box" data-arrowpos="center">
    <div class="container">
        <div class="row">
            <div class="span8">
                <h4 class="text">Want to be updated with our latest offers?</h4>
            </div>
            <div class="span4 align-center">
                <a href="#" class="btn">JOIN OUR NEWSLETTER</a>
            </div>
        </div>
    </div>
</div>-->
<!-- end action box -->
<?php } ?>