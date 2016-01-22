<?php 


class Object_Class_Data_DimensionUnitField extends Object_Class_Data {

    /**
     * Static type of this element
     *
     * @var string
     */
    public $fieldtype = "dimensionUnitField";

    /**
     * @var float
     */
    public $width;

    /**
     * @var float
     */
    public $defaultValue;

    /**
     * @var array()
     */
    public $validDimensionUnits;

    /**
     * Type for the column to query
     *
     * @var string
     */
    public $queryColumnType = array(
        "value" => "double",
        "unit" => "bigint(20)"
    );

    /**
     * Type for the column
     *
     * @var string
     */
    public $columnType = array(
        "value" => "double",
        "unit" => "bigint(20)"
    );

    /**
     * Type for the generated phpdoc
     *
     * @var string
     */
    public $phpdocType = "Object_Data_DimensionUnitField";

    /**
     * @return integer
     */
    public function getWidth() {
        return $this->width;
    }

    /**
     * @param integer $width
     * @return void
     */
    public function setWidth($width) {
        $this->width = $width;
    }

    /**
     * @return integer
     */
    public function getDefaultValue() {
        if($this->defaultValue !== null) {
            return (double) $this->defaultValue;
        }
    }

    /**
     * @param integer $defaultValue
     * @return void
     */
    public function setDefaultValue($defaultValue) {
        if(strlen(strval($defaultValue)) > 0) {
            $this->defaultValue = $defaultValue;
        }
    }

    /**
     * @param  array() $validDimensionUnits
     * @return void
     */
    public function setValidDimensionUnits($validDimensionUnits) {
        $this->validDimensionUnits = $validDimensionUnits;
    }

    /**
     * @return array()
     */
    public function getValidDimensionUnits() {
        return $this->validDimensionUnits;
    }


    /**
     * @see Object_Class_Data::getDataForResource
     * @param float $data
     * @return float
     */
    public function getDataForResource($data, $object = null) {
        if ($data instanceof Object_Data_DimensionUnitField) {
            return array(
                $this->getName() . "__value" => $data->getValue(),
                $this->getName() . "__unit" => $data->getUnitId()
            );
        }
        return array(
            $this->getName() . "__value" => null,
            $this->getName() . "__unit" => null
        );

    }

    /**
     * @see Object_Class_Data::getDataFromResource
     * @param float $data
     * @return float
     */
    public function getDataFromResource($data) {
        if($data[$this->getName() . "__value"] && $data[$this->getName() . "__unit"]) {
            return new Object_Data_DimensionUnitField($data[$this->getName() . "__value"], $data[$this->getName() . "__unit"]);
        }
        return;
    }

    /**
     * @see Object_Class_Data::getDataForQueryResource
     * @param float $data
     * @return float
     */
    public function getDataForQueryResource($data, $object = null) {
        return $this->getDataForResource($data);
    }

    /**
     * @see Object_Class_Data::getDataForEditmode
     * @param float $data
     * @return float
     */
    public function getDataForEditmode($data, $object = null) {
        if ($data instanceof Object_Data_DimensionUnitField) {
            return array(
                "value" => $data->getValue(),
                "unit" => $data->getUnitId()
            );
        }

        return;
    }

    /**
     * @see Object_Class_Data::getDataFromEditmode
     * @param float $data
     * @return float
     */
    public function getDataFromEditmode($data, $object = null) {
        if($data["value"] || $data["unit"] ) {
            return new Object_Data_DimensionUnitField($data["value"], $data["unit"]);
        }
        return;
    }

    /**
     * @see Object_Class_Data::getVersionPreview
     * @param float $data
     * @return float
     */
    public function getVersionPreview($data) {
        if($data instanceof Object_Data_DimensionUnitField) {
            return $data->getValue() . " " . $data->getUnit()->getAbbreviation();
        }
        return "";
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
            if((!empty($value) && !is_numeric($data->getValue())) || !($data->getUnitId())) {
                throw new Exception(get_class($this).": invalid dimension unit data");
            }
        }
    }

    /**
     * converts object data to a simple string value or CSV Export
     * @abstract
     * @param Object_Abstract $object
     * @return string
     */
    public function getForCsvExport($object) {

        $key = $this->getName();
        $getter = "get".ucfirst($key);
        if($object->$getter() instanceof Object_Data_DimensionUnitField){
            return $object->$getter()->getValue() . "_" . $object->$getter()->getUnitId();
        } else return null;
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
            $number = (double) str_replace(",",".",$values[0]);
            $value = new Object_Data_DimensionUnitField($number, $values[1]);
        }
        return $value;
    }


       /**
     * converts data to be exposed via webservices
     * @param string $object
     * @return mixed
     */
    public function getForWebserviceExport ($object) {

        $key = $this->getName();
        $getter = "get".ucfirst($key);

        if ($object->$getter() instanceof Object_Data_DimensionUnitField) {
            return array(
                "value" => $object->$getter()->getValue(),
                "unit" => $object->$getter()->getUnitId(),
                "unitAbbreviation" => $object->$getter()->getUnit()->getAbbreviation()
            );
        } else return null;
    }

     /**
     * converts data to be imported via webservices
     * @param mixed $value
     * @return mixed
     */
    public function getFromWebserviceImport ($value) {
        if(empty($value)){
            return null;
        }else if($value["value"] !== null && $value["unit"] !== null && $value["unitAbbreviation"] !== null) {

            $unit = DimensionUnitField_Unit::getById($value["unit"]);
            if($unit && $unit->getAbbreviation() == $value["unitAbbreviation"]) {
                return new Object_Data_DimensionUnitField($value["value"], $value["unit"]);
            } else {
                throw new Exception(get_class($this).": cannot get values from web service import - unit id and unit abbreviation do not match with local database");
            }
        } else {
            throw new Exception(get_class($this).": cannot get values from web service import - invalid data");
        }
    }

}
