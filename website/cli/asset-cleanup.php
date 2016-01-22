<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../pimcore/cli/startup.php");
chdir($workingDirectory);


$count = 1;
$page = 0;

while($count) {
    echo "\n\nProcessing Page $page ............\n\n";

    $list = new Asset_List();
    $list->setCondition("type != 'folder' AND path LIKE '%product%' AND id NOT IN (SELECT targetid FROM dependencies WHERE targettype = 'asset')");
    $list->setLimit(100);
    $list->setOffset($page * 100);
    $count = count($list->load());

    foreach ($list as $asset) {
        echo "deleting asset " . $asset->getFullPath() . "...";
        $asset->delete();
        echo "done\n";
    }

}

echo "finished\n\n";