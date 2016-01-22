<?php
namespace Elements\OutputDataConfigToolkit\ConfigElement\Operator;
 
class TableCol extends AbstractOperator {

    protected $colspan;
    protected $headline;

    public function __construct($config, $context = null) {
        parent::__construct($config, $context);

        $this->colspan = $config->colspan;
        $this->headline = $config->headline;
    }

    public function getLabeledValue(\Object_Abstract $object) {
        $value = null;

        $childs = $this->getChilds();
        if($childs[0]) {
            $value = $childs[0]->getLabeledValue($object);
            $value->colSpan = $this->colspan;
            $value->headline = $this->headline;

            if(empty($value) || $childs[0] instanceof \Elements\OutputDataConfigToolkit\ConfigElement\Operator\Text) {
                $value->empty = true;
            }            
        }

        return $value;
    }
}
