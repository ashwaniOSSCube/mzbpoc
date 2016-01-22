<?php

    $linkProduct = $this->product;

//TODO find a better solution for that
    $linkProduct = $this->product->getLinkProduct();
    $link = $linkProduct->getShopDetailLink($this->view);
?>
<div class="span3">
    <div class="product-list-item">
        <span class="hover"></span>
        <div class="image">
            <a href="<?=$link?>"><img src="<?=$this->product->getFirstImage('productList')?>" alt=""></a>
        </div>
        <div class="details fixclear">
            <h3><?=$this->product->getOsName()?></h3>
            <p class="desc"><?=Website_Tool_Text::cutStringRespectingWhitespace(strip_tags($this->product->getDescription()), 70)?></p>
            <div class="actions">
                <a href="<?= $this->view->url(array('action' => 'add', 'item' => $linkProduct->getId()), 'cart') ?>" class="add-to-cart"><?= $this->translate("shop.addtocart") ?></a>
                <a href="<?=$link?>"><?= $this->translate("shop.moreinfo") ?></a>
            </div>
            <div class="price">
                <span><?=$this->product->getOsPrice()?></span>
            </div>
        </div>
    </div><!-- end product-item -->
</div>