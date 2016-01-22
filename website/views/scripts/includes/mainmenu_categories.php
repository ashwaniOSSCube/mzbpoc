
<?php
    $shopDocument = $this->document->getProperty("shopDocument");
?>

<?php if($shopDocument) { ?>

    <li>
        <a href="<?= $shopDocument ?>"><?= $shopDocument->getName() ?></a>


        <ul>
            <?php foreach(Website_ShopCategory::getTopLevelCategories() as $category) { ?>
                <li>
                    <a href="<?= $this->url(array("country" => $this->language, "name" => $category->getNavigationPath(), "category" => $category->getId()), "shop-category-listing") ?>">
                        <?= $category->getName() ?>
                    </a>
                </li>
            <?php } ?>
        </ul>

    </li>

<?php } ?>

