<?php

class DimensionUnitField_Unit_List extends Pimcore_Model_List_Abstract {

    /**
     * @var array
     */
    public $units;

    /**
     * @var array
     */
    public function isValidOrderKey($key) {
        if($key == "abbreviation" || $key == "group" || $key == "id" || $key == "longname") {
            return true;
        }
        return false;
    }

    /**
     * @return array
     */
    function getUnits() {
        if(empty($this->units)) {
            $this->load();
        }
        return $this->units;
    }

    /**
     * @param array $units
     * @return void
     */
    function setUnits($units) {
        $this->units = $units;
    }

}
