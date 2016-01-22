<div class="container">
    <div id="mainbody">

        <div id="forgot_panel">
            <div class="inner-container forgot-panel">
                <h3 class="m_title">FORGOT YOUR DETAILS?</h3>
                <form id="forgot_form" name="forgot_form" action="<?= $this->url(array('action' => 'forgot'), 'user') ?>" method="post">
                    <p>
                        <input type="text" id="forgot-email" name="email" class="inputbox" placeholder="Email Address" value="<?= $this->getParam('email') ?>">
                    </p>
                    <p>
                        <input type="submit" id="recover" name="submit" value="SEND MY DETAILS!">
                    </p>
                </form>
            </div>
        </div><!-- end register panel -->

    </div>
</div>