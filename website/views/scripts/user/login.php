<div class="container">
    <div id="mainbody">

        <div id="login_panel">
            <div class="inner-container login-panel">
                <h3 class="m_title">SIGN IN YOUR ACCOUNT TO HAVE ACCESS TO DIFFERENT FEATURES</h3>
                <form id="login_form" name="login_form" method="post" action="<?= $this->url(array('action' => 'login'), 'user') ?>">
                    <a href="#" class="create_account" onClick="ppOpen('#register_panel', '280');">CREATE ACCOUNT</a>
                    <input type="text" id="username" name="username" class="inputbox" placeholder="Username">
                    <input type="password" id="password" name="password" class="inputbox" placeholder="Password">
                    <input type="submit" id="login" name="submit" value="LOG IN">
                    <a href="#" class="login_facebook">login with facebook</a>
                </form>
                <div class="links"><a href="#" onClick="ppOpen('#forgot_panel', '350');">FORGOT YOUR USERNAME?</a> / <a href="#" onClick="ppOpen('#forgot_panel', '350');">FORGOT YOUR PASSWORD?</a></div>
            </div>
        </div><!-- end login panel -->

    </div>
</div>