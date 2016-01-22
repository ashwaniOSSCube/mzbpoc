<?php if($this->editmode) { ?>
    <link rel="stylesheet" href="/static/css/editmode.css" type="text/css"/>
<?php } ?>


<footer id="footer">
<?php if($this->editmode) { ?>

    <div class="container">
        <h2>Footer Links</h2>

        <h3>Headline</h3>
        <?= $this->input("headline") ?>

        <br />
        <br />

        <h3>Links</h3>
        <?php while($this->block("links")->loop()) { ?>
            <?= $this->link("link") ?>
        <?php } ?>

    </div>

<?php } else { ?>

        <div class="container">
            <div class="row">
                <div class="span5">
                    <h3 class="m_title"><?= $this->input("headline") ?></h3>
                    <ul class="menu">
                        <?php while($this->block("links")->loop()) { ?>
                            <li><?= $this->link("link") ?></li>
                        <?php } ?>
                    </ul>
                    <!-- end footer menu -->
                </div>

                <div class="span4">
                    <!--<div class="newsletter-signup">
                        <h3 class="m_title"><?= $this->translate("NEWSLETTER SIGNUP") ?></h3>

                        <p><?= $this->translate("By subscribing to our mailing list you will always be update with the latest news from us.") ?></p>

                        <form method="post" id="newsletter_subscribe" name="newsletter_form" action="<?= $this->language?>/newsletter/subscribe">
                            <input type="text" name="email" id="nl-email" value="" placeholder="your.address@email.com"/>
                            <input type="submit" name="submit" id="nl-submit" value="<?= $this->translate("JOIN US") ?>"/>
                        </form>
                        <span id="result"></span>
                    </div>-->
                </div>
                <div class="span3">
                    <div class="contact-details">
                        <h3 class="m_title"><?= $this->translate("GET IN TOUCH") ?></h3>

                        <p><strong>Phone: +43 662 876606</strong><br/>
                            Email: <a href="mailto:info@pimcore.org">info@pimcore.org</a></p>

                        <p>pimcore GmbH<br/>
                            Gusswerk Halle 6, Söllheimerstraße 16 <br/>A-5121 Salzburg, AT</p>

                        <p><a href="http://goo.gl/maps/5EKgb" target="_blank" class="map-link"><span
                                class="icon-map-marker icon-white"></span> <?= $this->translate("Open in Google Maps") ?></a></p>
                    </div>
                    <!-- end contact-details -->
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="span12">
                    <div class="bottom fixclear">
                        <!--<ul class="social-icons fixclear">
                            <li class="title"><?= $this->translate("GET SOCIAL") ?></li>
                            <li class="social-facebook">
                                <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.pimcore.org%2F&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;font=arial&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=498405056859110" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowTransparency="true"></iframe>
                            </li>
                            <li class="social-twitter">
                                <a href="https://twitter.com/pimcore" class="twitter-follow-button" data-show-count="false" data-show-screen-name="false">Follow @pimcore</a>
                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                            </li>
                            <li class="social-facebook">
                                <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
                                <g:plusone size="medium" href="http://www.pimcore.org/"></g:plusone>
                            </li>
                        </ul>-->
                        <!-- end social-icons -->
                        <div class="copyright">
                            <a href="/"><img src="/static/images/logo.png" alt=""/></a>
                            <p>
                                &copy; <?= date("Y") ?> <strong>pimcore GmbH</strong>.
                                <br/>
                                All Rights Reserved.
                            </p>
                        </div>
                        <!-- end copyright -->
                    </div>
                    <!-- end bottom -->
                </div>
            </div>
            <!-- end row -->

        </div>

<?php } ?>
</footer>