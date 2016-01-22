<?php

class DimensionUnitField_Unit_List_Resource extends Pimcore_Model_List_Resource_Abstract {

    /**
     * @return array
     */
    public function load() {
        $units = array();

        $unitIds = $this->db->fetchCol("SELECT id FROM " . DimensionUnitField_Unit_Resource::TABLE_NAME .
                                                 $this->getCondition() . $this->getOrder() . $this->getOffsetLimit());

        foreach ($unitIds as $id) {
            $units[] = DimensionUnitField_Unit::getById($id);
        }

        $this->model->setUnits($units);

        return $units;
    }

    public function getTotalCount() {
        $amount = $this->db->fetchRow("SELECT COUNT(*) as amount FROM `" . DimensionUnitField_Unit_Resource::TABLE_NAME . "`" . $this->getCondition());
        return $amount["amount"];
    }

}