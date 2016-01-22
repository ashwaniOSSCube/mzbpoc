
<div class="contentblock table">
<?php if ($this->editmode) { ?>

    <?= $this->translate("print.headline"); ?>: <?= $this->input("headline1"); ?>
    <?= $this->translate("print.headline2"); ?>: <?= $this->input("headline2"); ?>
    <?= $this->translate("print.headline3"); ?>: <?= $this->input("headline3"); ?>

        <script type="text/javascript">
            var elements_table_Toolbar = [
                ['Table','-'],
                ['Bold','Italic','Underline','Strike','-','Subscript','Superscript','-','SpecialChar'],
                ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                ['Link','Unlink'],
                ['Undo','Redo'],
                ['Source']
            ];
        </script>

        <?php

            $params = array();
            $availables = array (
                "width",
                "height",
                "resize_disabled",
                "sharedtoolbar",
                "enterMode",
                "contentsCss"
            );
            foreach ($availables as $available) {
                if (isset($this->$available) and (strlen($this->$available) > 0)) {
                    $params[$available] = $this->$available;
                }
            }
            $params["toolbar"] = "elements_table_Toolbar";

            echo $this->wysiwyg("contenttable",$params);
        ?>

<?php } else { ?>

    <?php if( $this->input("headline1")->getValue()) { ?>
        <!--<div class="layout-headline-chaptertitle"><?= $this->input("headline1")->getValue()?> <?= $this->input("headline2")->getValue() ? "|" : "" ?> </div>-->
        <?php } ?>
    <?php if( $this->input("headline2")->getValue()) { ?>
        <!--<div class="layout-headline-chaptersubtitle"><?= $this->input("headline2")->getValue()?></div>-->
    <?php } ?>

    <div class="contenttype table">

        <h1><?= $this->input("headline1"); ?></h1>
        <?php if($this->input("headline2")->getValue()) { ?>
            <h2><?= $this->input("headline2"); ?></h2>
        <?php } else { ?>
            <br/>
        <?php } ?>
        <h3><?= $this->input("headline3"); ?></h3>

        <?php
            $table = (string) $this->wysiwyg("contenttable");

            $j = array ();
            // @info maybe for later
            $rows = preg_match_all ("/\<tr/",$table,$j);

            $cols = preg_match_all ("/\<td/",$table,$j);


            $table = preg_replace ("/<table /","<table class=\"basetable\"",$table);
            $table = preg_replace ("/cellpadding=\".*\"/","",$table);
            $table = preg_replace ("/cellspacing=\".*\"/","",$table);
            $table = preg_replace ("/border=\".*\"/","",$table);
            $table = preg_replace("/width=\".*\"/", "", $table);

            //$table = Website_Tool_Text::filterHtmlStyles($table);

            echo $table;
        ?>
    </div>
<?php } ?>
</div>
