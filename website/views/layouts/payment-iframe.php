<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en-gb" class="no-js"> <!--<![endif]-->
<?php
    // get root node if there is no document defined (for pages which are routed directly through static route)
    if(!$this->document instanceof Document_Page) {
        $this->document = Document::getById(1);
    }
?>
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="/static/css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css">
    <link rel="stylesheet" href="/static/addons/superfish_responsive/superfish.css" type="text/css"/>
    <link rel="stylesheet" href="/static/css/template.css" type="text/css"/>
    <link rel="stylesheet" href="/static/css/updates.css" type="text/css"/>
    <link rel="stylesheet" href="/static/css/custom.css" type="text/css"/>


    <!-- This stylesheet only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/static/css/responsive-devices.css" type="text/css"/>

    <script src="/static/js/jquery-1.8.2.min.js"></script>

    <?=$this->placeholder('canonical')?>

</head>

<body>
    <?= $this->layout()->content ?>

<!-- custom scripts file -->

<?= $this->headScript() ?>

</body>
</html>