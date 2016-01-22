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
        <?php if(!$this->success) { ?>
            <h2>Sorry, something went wrong, please sign up again!</h2>
        <?php } else { ?>
            <h2>Thanks for confirming your address</h2>
        <?php } ?>
    </div><!-- end mainbody -->
</div><!-- end container -->