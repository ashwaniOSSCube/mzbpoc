<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tballmann
 * Date: 01.07.13
 * Time: 09:54
 * To change this template use File | Settings | File Templates.
 *
 * @var $this Pimcore_View
 */
?>
<div class="container">
    <div id="mainbody">

        <div class="row">
            <h1 class="page-title">Newsletter</h1>

            <div>
                <?php if(!$this->success) { ?>

                    <?php if ($this->unsubscribeMethod) { ?>
                        <?php if ($this->unsubscribeMethod == "email") { ?>
                            <p><?= $this->translate('newsletter.email.unknown') ?></p><!-- Sorry, we don't have your address in our database. -->
                        <?php } else { ?>
                            <p><?= $this->translate('newsletter.unsubscribe.invalid-token') ?></p><!--Sorry, your unsubscribe token is invalid, try to remove your address manually:-->
                        <?php } ?>
                    <?php } ?>

                    <form action="<?= $this->url(array('action' => 'unsubscribe'), 'newsletter') ?>" method="post">
                        <label for="email"><?= $this->translate('user.email') ?></label>
                        <input id="email" name="email" type="text" placeholder="your.address@email.com" />

                        <br />

                        <input type="submit" name="submit" value="<?= $this->translate('newsletter.unsubscribe') ?>" />
                    </form>
                <?php } else { ?>
                    <p><?= sprintf($this->translate('newsletter.unsubscribe.success'), '<b>'.$this->getParam('email').'</b>') ?></p>
                <?php } ?>
            </div>
        </div>

    </div><!-- end mainbody -->
</div><!-- end container -->