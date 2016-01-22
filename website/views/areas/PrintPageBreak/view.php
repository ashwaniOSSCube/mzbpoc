<?php
    $this->headLink()->prependStylesheet(
        array(
            'href' => $this->brick->getPath() . '/area.css',
            'rel' => 'stylesheet',
            'media' => 'screen',
            'type' => 'text/css'
        )
    );
    $this->headLink()->prependStylesheet(
        array(
            'href' => $this->brick->getPath() . '/area-print.css',
            'rel' => 'stylesheet',
            'media' => 'print',
            'type' => 'text/css'
        )
    );
?>

<div class="pagebreak-bottom"></div>
<div class="pagebreak-force-page-break"></div>
<div class="pagebreak-top"></div>
