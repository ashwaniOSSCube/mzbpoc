<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../pimcore/cli/startup.php");
chdir($workingDirectory);


$page = 0;
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

        if(!$p->getPrice()) {
            $price = rand(500,10000) / 100;
            echo " setting price to $price \n";
            $p->setPrice($price);
        }

        $p->save();
    }
    $page++;

    $count = count($products->getObjects());

    Pimcore::collectGarbage();
}
