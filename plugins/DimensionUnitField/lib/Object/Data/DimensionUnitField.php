<?php 


class Object_Data_DimensionUnitField {


    /**
     * @var double | string
     */
    public $value;

    /**
     * @var int
     */
    public $unitId;

    /**
     * @var DimensionUnitField_Unit
     */
    public $unit;


    public function __construct($value = null, $unitId = null) {
        $this->value = $value;
        $this->unitId = $unitId;
        $this->unit = null;
    }


    /**
     * @param  $unitId
     * @return void
     */
    public function setUnitId($unitId) {
        $this->unitId = $unitId;
        $this->unit = null;
    }

    /**
     * @return int
     */
    public function getUnitId() {
        return $this->unitId;
    }


    public function getUnit() {
        if(empty($this->unit)) {
            $this->unit = DimensionUnitField_Unit::getById($this->unitId);
        }
        return $this->unit;
    }

    /**
     * @param  $value
     * @return void
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * @return double
     */
    public function getValue() {
        return $this->value;
    }

    public function __toString() {
        return $this->getValue() . " " . $this->getUnit()->getAbbreviation();
    }
}
