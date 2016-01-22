<?php
/**
 * @var $this Pimcore_View
 * @var $brick Document_Tag_Area_Info
 */
$brick = $this->brick;

if (!(is_array($this->placeholder("__areas")->getValue()) and in_array($brick->getId(),$this->placeholder("__areas")->getValue()))) {
    $this->placeholder("__areas")->append($this->brick->getId());

    $this->headLink()->prependStylesheet(
        array(
            'href' => $brick->getPath() . '/area.css',
            'rel' => 'stylesheet',
            'media' => 'all',
            'type' => 'text/css'
        ));
}
?>

<?php if($this->editmode) { ?>
    <h3><?= $this->translate("print.toc"); ?></h3>
    <?= $this->translate("print.toc.title"); ?>: <?= $this->input("headline"); ?>

    <br/><hr/><br/>
    <h3><?= $this->translate("print.toc.generated") ?> </h3>

<?php } else { ?>
    <div class="layout-headline-chaptertitle"><?= $this->input("headline") ?></div>
    <div class="layout-headline-chaptersubtitle"></div>


    <h2><?= $this->input("headline") ?></h2>
    <br/>

    <div id="generalToc"></div>
    <?php $this->inlineScript()->appendFile($brick->getPath() . "/toc.js"); ?>
<?php } ?>

