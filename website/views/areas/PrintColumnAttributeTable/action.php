<?php

class Document_Tag_Area_PrintColumnAttributeTable extends Document_Tag_Area_Abstract {

    public function action() {
        $this->view->addScriptPath(PIMCORE_DOCUMENT_ROOT . $this->getBrick()->getPath());
    }
}