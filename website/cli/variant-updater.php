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
    $products->setObjectTypes(array("variant"));


    foreach($products as $p) {
        echo "Updating product " . $p->getId() . "\n";

        $p->setImagesInheritance("true");
        $p->save();

    }
    $page++;

    $count = count($products->getObjects());

    Pimcore::collectGarbage();
}
