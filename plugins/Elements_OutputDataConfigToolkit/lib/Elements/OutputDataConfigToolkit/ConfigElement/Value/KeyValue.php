<?php
namespace Elements\OutputDataConfigToolkit\ConfigElement\Value;

use Elements\OutputDataConfigToolkit\ConfigElement as ConfigElement;

class KeyValue extends DefaultValue {

    public $records = array();
    public  $index = null;

    public function __construct($config, $index = null) {
        parent::__construct($config);

        $this->index = $index;
        $this->records = $config->records;
    }

    public function getRecords(){
        return $this->records;
    }

    public function getCurrentRecord(){
        return $record = $this->records[$this->index];
    }


    public function getLabeledValue(\Object_Abstract $object) {
        if($this->index === null) {
            $this->index = 0;
        }
        if(is_array($this->records)) {
            $wholeResult = parent::getLabeledValue($object);
            $record = $this->records[$this->index];

            $result = new \stdClass();

            $getter = "get" . ucfirst($wholeResult->def->getName());
            $keyValueStore = $object->$getter();
            $result->value = $keyValueStore->getEntryByKeyId($record->id);
            $result->label = $record->label ? $record->label : $record->name;
            $result->description = $record->description;

            if(empty($value) || (is_object($value) && method_exists($value, "isEmpty") && $value->isEmpty())) {
                $result->empty = true;
            } else {
                $result->empty = false;
            }

            $result->def = $wholeResult->def;
            return $result;
        } else {
            throw new \Exception("Invalid Configuration of StructuredTable ConfigElement");
        }
    }

}
