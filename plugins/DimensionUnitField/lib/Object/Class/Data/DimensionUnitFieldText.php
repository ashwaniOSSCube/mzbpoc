<?php 


class Object_Class_Data_DimensionUnitFieldText extends Object_Class_Data_DimensionUnitField {

    /**
     * Static type of this element
     *
     * @var string
     */
    public $fieldtype = "dimensionUnitFieldText";

    /**
     * @var float
     */
    public $width;

    /**
     * Column length
     *
     * @var integer
     */
    public $columnLength = 255;

    /**
     * Type for the column to query
     *
     * @var string
     */
    public $queryColumnType = array(
        "value" => "varchar",
        "unit" => "bigint(20)"
    );

    /**
     * Type for the column
     *
     * @var string
     */
    public $columnType = array(
        "value" => "varchar",
        "unit" => "bigint(20)"
    );

    /**
     * Type for the generated phpdoc
     *
     * @var string
     */
    public $phpdocType = "Object_Data_DimensionUnitFieldText";


    /**
     * @param int $columnLength
     */
    public function setColumnLength($columnLength) {
        if($columnLength) {
            $this->columnLength = $columnLength;
        }
    }

    /**
     * @return int
     */
    public function getColumnLength() {
        return $this->columnLength;
    }


    /**
     * Checks if data is valid for current data field
     *
     * @param mixed $data
     * @param boolean $omitMandatoryCheck
     * @throws Exception
     */
    public function checkValidity($data, $omitMandatoryCheck = false){

        if(!$omitMandatoryCheck && $this->getMandatory() &&
           ($data === NULL || $data->getValue() === NULL || $data->getUnitId() === NULL)){
            throw new Exception(get_class($this).": Empty mandatory field [ ".$this->getName()." ]");
        }

        if(!empty($data)) {
            $value = $data->getValue();
            if((!empty($value) && !is_string($data->getValue())) || !($data->getUnitId())) {
                throw new Exception(get_class($this).": invalid dimension unit data");
            }
        }
    }


    /**
     * fills object field data values from CSV Import String
     * @param string $importValue
     * @return double
     */
    public function getFromCsvImport($importValue) {
        $values = explode("_", $importValue);

        $value = null;
        if ($values[0] && $values[1]) {
            $string = $values[0];
            $value = new Object_Data_DimensionUnitField($string, $values[1]);
        }
        return $value;
    }

    /**
     * @return array
     */
    public function getColumnType() {
        return array("value" => $this->columnType["value"] . "(" . $this->getColumnLength() . ")", "unit" =>  $this->columnType["unit"]);
    }

    /**
     * @return array
     */
    public function getQueryColumnType() {
        return array("value" => $this->queryColumnType["value"] . "(" . $this->getColumnLength() . ")", "unit" =>  $this->queryColumnType["unit"]);
    }    

}
