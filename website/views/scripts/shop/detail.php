<?php
    $this->placeholder('object_seotitle')->set( $this->product->getSeoName() );
    $this->placeholder('object_seodescription')->set( $this->product->getDescription() );

    $this->placeholder('canonical')->append('<link rel="canonical" href="http://'.$_SERVER['HTTP_HOST'].$this->product->internalGetBaseProduct()->getShopDetailLink($this, true).'"/>');
?>

<div class="container">

    <div id="mainbody">

        <div class="row">
            <div class="span9">


                <div class="row product-page">

                    <div class="span4">
                        <div class="product-gallery">
                            <div class="big_image">
                                <a href="<?=$this->product->getFirstImage('lightbox')?>" rel="prettyPhoto"><img src="<?=$this->product->getFirstImage('shopDetail')?>" alt="" /></a>
                            </div>
                            <?php if($this->product->getImages() && sizeof($this->product->getImages()->getItems()) > 1) {?>
                                <ul class="thumbs">
                                    <?php foreach($this->product->getImages()->getItems() as $item) { ?>
                                        <?php if($item->getImage()) { ?>
                                            <li><a href="<?=$item->getImage()->getThumbnail('lightbox')?>" rel="prettyPhoto"><img src="<?=$item->getImage()->getThumbnail('shopDetailThumb')?>" alt="" /></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                    </div>

                    <div class="span5">
                        <div class="main-data">
                            <p class="name"><?=$this->product->getName()?></p>
                            <?php if($this->product->getArtno()) { ?>
                                <p><strong><?= $this->translate("shop.sku") ?>:</strong> <?= $this->product->getArtno() ?></p>
                            <?php } ?>

                            <?php if($this->product->getEan()) { ?>
                                <p><strong><?= $this->translate("shop.ean") ?>:</strong> <?= $this->product->getEan() ?></p>
                            <?php } ?>
                            <?php if($this->product->getSize() && $this->product->getSize() != " ") { ?>
                                <p><strong><?= $this->translate("shop.size") ?>:</strong> <?= $this->product->getSize() ?></p>
                            <?php } ?>
                            <?php if($this->product->getColor()) { ?>
                                <?php
                                    $colors = $this->product->getColor();
                                    $translatedColors = array();
                                    foreach($colors as $c) {
                                        $translatedColors[] = $this->translate("optionvalue." . $c);
                                    }
                                ?>
                                <p><strong><?= $this->translate("shop.color") ?>:</strong> <?= implode(", ", $translatedColors) ?></p>
                            <?php } ?>


                            <?php
                                $priceInfo = $this->product->getOSPriceInfo();
                                $originalPrice = $this->product->getOSPriceInfo()->getOriginalPrice();
                                $price = $this->product->getOSPrice();
                                $hasDiscount = $originalPrice->getAmount() != $price->getAmount();
                            ?>
                            <?php if($hasDiscount) { ?>
                                <p class="regular_price"><?= $this->translate("shop.detail.regularprice") ?>: <span><?= $this->product->getOSPriceInfo()->getOriginalPrice() ?></span></p>
                            <?php } ?>

                            <p class="price">
                                <span><?= $this->product->getOSPrice() ?></span>
                                <a href="<?= $this->url(array("action" => "add", "item" => $this->product->getId()), "wishlist") ?>" class="add-to-wishlist"><?= $this->translate("shop.addtowishlist") ?> &larr;</a>
                            </p>


                            <?php if($priceInfo->getRules()) { ?>
                                <div class="discounts">
                                    <p><strong><?= $this->translate("shop.detail.your_benefit") ?></strong></p>
                                    <ul>
                                        <!--<li><?= $this->translate("shop.detail.your_benefit_general") ?> </li>-->
                                        <?php foreach($priceInfo->getRules() as $rule ) { ?>
                                            <?php foreach($rule->getActions() as $action) { ?>
                                                <?php if($action instanceof OnlineShop_Framework_Impl_Pricing_Action_ProductDiscount) { ?>
                                                    <?php if($action->getAmount() > 0) { ?>
                                                        <li><?= $rule->getLabel() ?> <?= $this->translate("shop.detail.your_benefit.discount.amount", new Zend_Currency(array("value" => $action->getAmount()))) ?></li>
                                                    <?php } else if($action->getPercent() > 0) { ?>
                                                        <li><?= $rule->getLabel() ?> <?= $this->translate("shop.detail.your_benefit.discount.percent", $action->getPercent()) ?></li>
                                                    <?php } ?>
                                                <?php } else if($action instanceof OnlineShop_Framework_Pricing_Action_IGift) { ?>
                                                        <li>
                                                            <?= $this->translate("shop.detail.your_benefit.discount.gift", '<a href="' . $action->getProduct()->getShopDetailLink($this, true) . '"> ' . $action->getProduct()->getName() . '</a>') ?>
                                                        </li>
                                                <?php } else if($action instanceof OnlineShop_Framework_Impl_Pricing_Action_FreeShipping) { ?>
                                                    <li>
                                                        <?= $this->translate("shop.detail.your_benefit.discount.freeshipping") ?>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>

                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>

                            <?php if($this->product->isVariant()) { ?>
                                <div class="to_cart">
                                    <form class="add-to-car-quantity" method="POST" action="<?= $this->url(array('action' => 'add', 'item' => $this->product->getId()), 'cart') ?>">
                                        <div class="quantitiy">
                                            <label for="qty"><?= $this->translate("shop.quantity") ?>:</label>
                                            <select name="qty" id="qty">
                                                <?for($i=1; $i<=15; $i++) {?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                <?}?>
                                            </select>
                                        </div>
                                        <input type="submit" class="addtocart btn btn-flat" value="<?= $this->translate("shop.addtocart") ?>" />
                                    </form>
                                    <div class="clear"></div>
                                </div>
                            <?php } ?>
                        </div><!-- end main data -->
                    </div>
                </div><!-- end row // product page -->

                <div class="row">
                    <div class="span9">

                        <div class="tabbable tabs_style1">
                            <ul class="nav fixclear">
                                <?php if($this->product->getDescription() || $this->product->getTechnologies()) { ?>
                                    <li class="active"><a href="#shop-tab1" data-toggle="tab"><?= $this->translate("shop.description") ?></a></li>
                                <?php } ?>
                                <?php if($this->hasSpec) { ?>
                                    <li><a href="#shop-tab2" data-toggle="tab"><?= $this->translate("shop.specification") ?></a></li>
                                <?php } ?>
                            </ul>

                            <div class="tab-content">
                                <?php if($this->product->getDescription() || $this->product->getTechnologies()) { ?>
                                    <div class="tab-pane active" id="shop-tab1">
                                        <?=$this->product->getDescription()?>

                                        <?php if($this->product->getTechnologies()) { ?>
                                            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th scope="col" colspan="2"><?= $this->translate("shop.technologyname") ?></th>
                                                    <th scope="col"><?= $this->translate("shop.description") ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($this->product->getTechnologies() as $technology) { ?>
                                                        <tr>
                                                            <td width="5%">
                                                                <?php if($technology->getIcon()) { ?>
                                                                    <img alt="<?= $technology->getName() ?>" src="<?= $technology->getIcon()->getThumbnail("shopDetailTechnology") ?>" />
                                                                <?php } ?>
                                                            </td>

                                                            <td width="20%">
                                                                <?= $technology->getName() ?>
                                                            </td>
                                                            <td width="70%"><?= $technology->getDescription() ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if($this->hasSpec) { ?>
                                    <div class="tab-pane" id="shop-tab2">
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table table-hover table-specifications">
                                            <thead>
                                                <tr>
                                                    <th scope="col"><?= $this->translate("shop.label") ?></th>
                                                    <th scope="col"><?= $this->translate("shop.value") ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($this->specificationOutputChannel as $property) { ?>
                                                    <?= $this->productDetailSpecification($property, $this->product); ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <?php } ?>
                            </div><!-- End Tabs -->
                        </div><!-- end tabbable -->

                    </div>
                </div><!-- end row -->

            </div>

            <div class="span3">
                <?php
                    $colorVariants = $this->product->getColorVariants();
                    $sizeVariants = $this->product->getSizeVariants();
                ?>
                <?php if(count($colorVariants) > 1 || count($sizeVariants) > 1 || $this->product->getRelatedProducts() || count($this->recentlyViewed) > 0) { ?>
                    <div id="sidebar" class="sidebar-right">


                        <?php if(count($colorVariants) > 1) { ?>
                            <div class="widget colorvariant">
                                <h3 class="title"><?= $this->translate("shop.detail.select_color") ?></h3>
                                <?php foreach($colorVariants as $variant) { ?>
                                    <?php
                                        $active = "";
                                        if($this->product->getBaseColorVariant() && $variant->getBaseColorVariant()->getId() == $this->product->getBaseColorVariant()->getId()) {
                                            $active = "active";
                                        }
                                    ?>
                                    <a href="<?= $variant->getShopDetailLink($this) ?>">
                                        <img class="<?= $active ?>" data-preview="<?= $variant->getFirstImage("shopDetail") ?>" src="<?= $variant->getFirstImage("shopDetailThumb") ?>" alt="<?=$variant->getSeoName() ?>" />
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if(count($sizeVariants) > 1) { ?>
                            <div class="widget sizevariant clearfix">
                                <h3 class="title"><?= $this->translate("shop.detail.select_size") ?></h3>
                                <?php foreach($sizeVariants as $variant) { ?>

                                    <?php
                                        $active = "";
                                        if($variant->getId() == $this->product->getId()) {
                                            $active = "active";
                                        }
                                    ?>

                                    <a href="<?= $variant->getShopDetailLink($this) ?>" class="<?= $active ?>">
                                        <?= $variant->getSize() ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if($this->product->getRelatedProducts()) { ?>
                            <div class="widget relatedproducts clearfix">
                                <h3 class="title"><?= $this->translate("shop.detail.related_products") ?></h3>
                                    <?php foreach($this->product->getRelatedProducts() as $p) { ?>

                                        <?php
                                            $firstSizeVariants = $p->getColorVariants(true);
                                            $linkProduct = $firstSizeVariants[0];
                                            $link = $linkProduct->getShopDetailLink($this);
                                        ?>
                                        <div class="span2">
                                            <div class="product-list-item">
                                                <span class="hover"></span>
                                                <div class="image">
                                                    <a href="<?=$link?>"><img src="<?=$p->getFirstImage('relatedProducts')?>" alt=""></a>
                                                </div>
                                                <div class="details fixclear">
                                                    <h3><?=$p->getName()?></h3>
                                                    <div class="actions">
                                                        <a href="<?= $this->url(array('action' => 'add', 'item' => $linkProduct->getId()), 'cart') ?>" class="add-to-cart"><?= $this->translate("shop.addtocart") ?></a>
                                                        <a href="<?=$link?>"><?= $this->translate("shop.moreinfo") ?></a>
                                                    </div>
                                                    <div class="price">
                                                        <span><?= $p->getOsPrice() ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                            </div>
                        <?php } ?>

                        <?php if($this->similarProducts) { ?>
                            <div class="widget relatedproducts clearfix">
                                <h3 class="title"><?= $this->translate("shop.detail.similar_products") ?></h3>
                                <?php foreach($this->similarProducts as $p) { ?>

                                    <?php
                                    $firstSizeVariants = $p->getColorVariants(true);
                                    $linkProduct = $firstSizeVariants[0];
                                    $link = $linkProduct->getShopDetailLink($this);
                                    ?>
                                    <div class="span2">
                                        <div class="product-list-item">
                                            <span class="hover"></span>
                                            <div class="image">
                                                <a href="<?=$link?>"><img src="<?=$p->getFirstImage('relatedProducts')?>" alt=""></a>
                                            </div>
                                            <div class="details fixclear">
                                                <h3><?=$p->getName()?></h3>
                                                <div class="actions">
                                                    <a href="<?= $this->url(array('action' => 'add', 'item' => $linkProduct->getId()), 'cart') ?>" class="add-to-cart"><?= $this->translate("shop.addtocart") ?></a>
                                                    <a href="<?=$link?>"><?= $this->translate("shop.moreinfo") ?></a>
                                                </div>
                                                <div class="price">
                                                    <span><?= $p->getOsPrice() ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        <?php } ?>

                        <?php if(count($this->recentlyViewed) > 0): ?>
                            <div class="widget relatedproducts clearfix">
                                <h3 class="title"><?= $this->translate("shop.detail.recently_viewed_products") ?></h3>
                                <?php foreach($this->recentlyViewed as $product): ?>
                                    <?php
                                    /* @var Website_DefaultProduct $product */
                                    $link = $product->getShopDetailLink($this);
                                    ?>
                                    <div class="span2">
                                        <div class="product-list-item">
                                            <span class="hover"></span>
                                            <div class="image">
                                                <a href="<?=$link?>"><img src="<?=$product->getFirstImage('relatedProducts')?>" alt=""></a>
                                            </div>
                                            <div class="details fixclear">
                                                <h3><?=$product->getName()?></h3>
                                                <div class="actions">
                                                    <a href="<?= $this->url(array('action' => 'add', 'item' => $product->getId()), 'cart') ?>" class="add-to-cart"><?= $this->translate("shop.addtocart") ?></a>
                                                    <a href="<?=$link?>"><?= $this->translate("shop.moreinfo") ?></a>
                                                </div>
                                                <div class="price">
                                                    <span><?= $product->getOsPrice() ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php } ?>
            </div>

        </div><!-- end row -->

    </div><!-- end mainbody -->

</div><!-- end container -->