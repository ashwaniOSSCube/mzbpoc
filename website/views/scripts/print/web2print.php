<?php $this->layout()->setLayout('print'); ?>

<?php

    $cssChapterClass = $this->document->getProperty("print_katalog_chapterclass");
    if(empty($cssChapterClass)) {
        $this->document->setProperty("print_katalog_chapterclass", "text", uniqid("chapter"));
    }


    $allowedAreas = Web2Print_CustomArea::getCustomAreaIdsByType("katalogdemo");

    $allowedAreas = array_merge($allowedAreas, array(
        "PrintWysiwygPageImages",
        "PrintWysiwygTable",
        "PrintPageBreak",
        "PrintChapterControl",
        "PrintTableOfContents",
        "PrintColumnAttributeTable",
        "PrintKatalogProductDescription",
        "PrintKatalogProductDescriptionVariants"
    ));

?>


<div class="page <?= $this->document->getProperty("print_katalog_chapterclass") ?>" id="documentpage-<?= $this->document->getId() ?>">

    <?=
    $this->areablock("contentAreablock",
        array("allowed" => $allowedAreas)
    );
    ?>

</div>