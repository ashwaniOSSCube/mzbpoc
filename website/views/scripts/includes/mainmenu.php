<nav id="main_menu">
    <ul class="sf-menu" style="float:left">

        <?php $this->template("includes/mainmenu_categories.php") ?>

        <?php
        $this->nav = $this->pimcoreNavigation()->getNavigation($this->document, $this->document->getProperty('rootDocument'));
        $this->navigation()->menu()->setUseTranslator(false); // to deactivate the translator provided by the view helper

        $this->navigation($this->nav);
        $this->navigation()->menu()->setPartial(array('includes/mainmenu_partial.php', "website"));
        echo $this->navigation()->menu()->render($this->nav, array("maxDepth" => 1, "ulClass" => "sf-menu"));
        ?>
    </ul>
</nav>