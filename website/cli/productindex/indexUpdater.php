<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../../pimcore/cli/startup.php");
chdir($workingDirectory);

\Pimcore\Model\Cache::clearTag("ecommerceconfig");

OnlineShop_Framework_IndexService_Tool_IndexUpdater::updateIndex("Object_Product_List", "", true);

OnlineShop_Framework_IndexService_Tool_IndexUpdater::processPreparationQueue();
OnlineShop_Framework_IndexService_Tool_IndexUpdater::processUpdateIndexQueue();

