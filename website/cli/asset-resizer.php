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
    $list->setCondition("type = 'image' and path LIKE '%product%'");
    $list->setLimit(100);
    $list->setOffset($page * 100);
    $count = count($list->load());

    foreach($list as $asset) {
        $image = Asset_Image::getImageTransformInstance();

        echo "Processing asset " . $asset->getFileSystemPath() . " ( " . $asset->getId() . " ) ... ";


        if($image->load($asset->getFileSystemPath())) {

            if($image->getWidth() > 500) {
                echo "doing\n";
                $image->scaleByWidth(500);
                $type = Pimcore_File::getFileExtension($asset->getFilename());
                $image->save($asset->getFileSystemPath(), $type);
            }
        }

        $asset->clearThumbnails();

        echo "done\n";
    }
    $page++;

}

die("done\n");
