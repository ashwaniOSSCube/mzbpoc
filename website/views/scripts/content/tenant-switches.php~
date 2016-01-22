<?php
    $wide = $this->document->getProperty("content_wide");
?>

<div class="container">

    <div id="mainbody">

        <div class="row">

            <?php if(!$wide) { ?>
                <div class="span3">
                    <div class="sidebar-left" id="sidebar">

                        <div class="widget">
                            <?php
                                $this->navStartNode = $this->document->getProperty("navStartNode");
                                // get the document which should be used to start in navigation | default home
                                if(!$this->navStartNode instanceof Document_Page) {
                                    $this->navStartNode = Document::getById(1);
                                }
                                $this->nav = $this->pimcoreNavigation()->getNavigation($this->document, $this->navStartNode);
                                $this->navigation()->menu()->setUseTranslator(false); // to deactivate the translator provided by the view helper
                                $this->navigation($this->nav);
                            ?>
                            <h4 class="title"><a href="<?= $this->navStartNode ?>"><?= $this->navStartNode->getProperty("navigation_name"); ?></a></h4>
                            <?=  $this->navigation()->menu()->renderMenu($this->nav, array("ulClass" => "menu")); ?>
                        </div><!-- end widget -->
                    </div>
                </div>
            <?php } ?>

            <div class="<?= $wide ? "span12" : "span9" ?>">
                <h1 class="page-title"><?= $this->input("healine") ?></h1>


                <h3>Checkout Tenants</h3>

                <?php foreach($this->checkoutTenants as $checkoutTenant) { ?>
                    <a href="?change-checkout-tenant=<?= $checkoutTenant ?>" class="btn btn-block <?= $checkoutTenant == $this->currentCheckoutTenant ? "btn-success" : "" ?>" type="button">
                        <?= $checkoutTenant ?>
                    </a>
                <?php } ?>



                <h3>Assortment Tenants</h3>

                <?php foreach($this->assortmentTenants as $assortmentTenant) { ?>
                    <a href="?change-assortment-tenant=<?= $assortmentTenant ?>" class="btn btn-block <?= $assortmentTenant == $this->currentAssortmentTenant ? "btn-success" : "" ?>" type="button">
                        <?= $assortmentTenant ?>
                    </a>
                <?php } ?>


            </div>

        </div><!-- end row -->

    </div><!-- end mainbody -->

</div>

