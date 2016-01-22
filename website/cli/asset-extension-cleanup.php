<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../pimcore/cli/startup.php");
chdir($workingDirectory);


$overlay = Asset_Image::getById(4871);

$count = 1;
$page = 9;

while($count) {
    echo "\n\nProcessing Page $page ............\n\n";

    $list = new Asset_List();
    $list->setCondition("type = 'image' and path LIKE '/protouch-eu%'");
    $list->setLimit(100);
    $list->setOffset($page * 100);
    $count = count($list->load());

    foreach($list as $asset) {
        echo "Processing asset " . $asset->getFileSystemPath() . " ( " . $asset->getId() . " ) ... ";

        $image = Asset_Image::getImageTransformInstance();

        if($image->load($asset->getFileSystemPath())) {

            $type = Pimcore_File::getFileExtension($asset->getFilename());

            if(strtolower($type) != strtolower($image->getImageType())) {
                $newFilename = str_replace("." . $type, "." . strtolower($image->getImageType()), $asset->getFilename());

                $asset->setFilename($newFilename);
                $asset->save();

            }
        }
        echo "done\n";
    }
    $page++;
}

die("done\n");
