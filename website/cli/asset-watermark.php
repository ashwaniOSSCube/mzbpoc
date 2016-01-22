<?php

$workingDirectory = getcwd();
chdir(__DIR__);
include_once("../../pimcore/cli/startup.php");
chdir($workingDirectory);


$overlay = Asset_Image::getById(4871);

$count = 1;
$page = 5;

while($count) {
    echo "\n\nProcessing Page $page ............\n\n";

    $list = new Asset_List();
    $list->setCondition("type = 'image' and path LIKE '/protouch-eu%'");
    $list->setLimit(100);
    $list->setOffset($page * 100);
    $count = count($list->load());

    foreach($list as $asset) {
        echo "Processing asset " . $asset->getFileSystemPath() . " ( " . $asset->getId() . " ) ... ";

        $assetWidth = $asset->getWidth();
        $overlayThumbnail = $overlay->getThumbnail(array("width" => round($assetWidth / 3)));

        $image = Asset_Image::getImageTransformInstance();

        if($image->load($asset->getFileSystemPath())) {
            $image = $image->addOverlay($overlayThumbnail->getPath(), $assetWidth / 100, $assetWidth / 100, 100, "COMPOSITE_DEFAULT", "bottom-right");

            $type = Pimcore_File::getFileExtension($asset->getFilename());

            if(strtolower($type) == strtolower($image->getImageType())) {
                $image->save($asset->getFileSystemPath(), $type);
            } else {
                $oldPath = $asset->getFileSystemPath();
                $newPath = $asset->getFileSystemPath();
                $newPath = str_replace("." . $type, "." . strtolower($image->getImageType()), $newPath);

                $image->save($newPath, $type);

                copy($newPath, $oldPath);
                unlink($newPath);
            }
        }

        $asset->clearThumbnails();

        echo "done\n";
    }
    $page++;

}

die("done\n");
