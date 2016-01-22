<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../pimcore/cli/startup.php");
chdir($workingDirectory);


$page = 17;
$pageSize = 100;
$count = $pageSize;
$products = array();

while($count > 0) {
    echo "=========================\n";
    echo "Page: " . $page ."\n";
    echo "=========================\n";

    $products = new Object_Product_List();
    $products->setIgnoreLocalizedFields(true);
    $products->setUnpublished(true);
    $products->setOffset($page * $pageSize);
    $products->setLimit($pageSize);
    $products->setObjectTypes(array("object", "folder", "variant"));


    foreach($products as $p) {
        echo "Updating product " . $p->getId() . "\n";

        $p->setName($p->getName("en_GB"), "de_AT");
        $p->setSeoname($p->getSeoname("en_GB"), "de_AT");
        $p->setColorName($p->getColorName("en_GB"), "de_AT");
        $p->setPrice($p->getPrice("en_GB"), "de_AT");
        $p->setPriceOld($p->getPriceOld("en_GB"), "de_AT");
        $p->setFromPrice($p->getFromPrice("en_GB"), "de_AT");
        $p->setDescription($p->getDescription("en_GB"), "de_AT");
        $p->setMaterial($p->getMaterial("en_GB"), "de_AT");

        $p->save();

    }
    $page++;

    $count = count($products->getObjects());

    Pimcore::collectGarbage();
}
