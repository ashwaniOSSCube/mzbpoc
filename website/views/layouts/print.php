<html>
<head>
    <link rel="stylesheet" type="text/css" href="/website/static/print/css/style.css"/>

    <?php if($this->document->getProperty("sidebar")) { ?>
        <?= $this->inc($this->document->getProperty("sidebar"), array("stylesheet" => true, "printermarks" => $this->printermarks)); ?>
    <?php } ?>

    <link rel="stylesheet" type="text/css" href="/website/static/print/css/print-edit.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/website/static/print/css/preview.css" media="screen"/>

    <?php if($this->printermarks) { ?>
        <link rel="stylesheet" type="text/css" href="/website/static/print/css/print-printermarks.css" media="print" />
    <?php } ?>

    <?= $this->headLink() ?>
    <?= $this->headScript() ?>


</head>

<body>
<div class="canvas">
    <?= $this->layout()->content ?>
</div>


<script type="text/javascript" src="/website/static/print/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/website/static/print/js/init.js"></script>

<?= $this->inlineScript() ?>
</body>
</html>