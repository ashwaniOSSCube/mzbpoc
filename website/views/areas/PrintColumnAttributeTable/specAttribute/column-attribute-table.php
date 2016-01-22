<?php
    $levels = Web2Print_Tool::getMaxGroupDepth($this->configArray);
?>

<thead>
    <?= $this->partial("/specAttribute/column-attribute-table-header.php",
        array("configArray" => $this->configArray, "classname" => $this->classname, "levels" => $levels, "currentLevel" => 0));
    ?>
</thead>

<tbody>
    <?= $this->partial("/specAttribute/column-attribute-table-values.php",
        array("configArray" => $this->configArray, "elements" => $this->elements, "thumbnailName" => $this->thumbnailName));
    ?>
</tbody>
