<div class="container">
    <div id="mainbody">

        <div id="register_panel">
            <div class="inner-container register-panel">
                <h3 class="m_title">CREATE ACCOUNT</h3>
                <form id="register_form" name="register_form" method="post" action="<?= $this->url(array('action' => 'register'), 'user') ?>">
                    <p>
                        <input type="text" id="reg-firstname" name="firstname" class="inputbox" value="<?= $this->getParam('firstname') ?>" placeholder="<?= $this->translate('user.firstname') ?>">
                    </p>
                    <p>
                        <input type="text" id="reg-fullname" name="lastname" class="inputbox" value="<?= $this->getParam('lastname') ?>" placeholder="<?= $this->translate('user.lastname') ?>">
                    </p>
                    <p>
                        <input type="text" id="reg-email" name="email" class="inputbox" value="<?= $this->getParam('email') ?>" placeholder="<?= $this->translate('user.register.email') ?>">
                    </p>
                    <p>
                        <input type="password" id="reg-password" name="password" class="inputbox" placeholder="<?= $this->translate('user.register.password') ?>">
                    </p>
                    <p>
                        <input type="password" id="confirm_password" name="confirm_password" class="inputbox" placeholder="<?= $this->translate('user.register.password.confirm') ?>">
                    </p>
                    <p>
                        <input type="submit" id="signup" name="submit" value="CREATE MY ACCOUNT">
                    </p>
                </form>
                <div class="links"><a href="#" onClick="ppOpen('#login_panel', '800');">ALREADY HAVE AN ACCOUNT?</a></div>
            </div>
        </div><!-- end register panel -->

    </div>
</div>