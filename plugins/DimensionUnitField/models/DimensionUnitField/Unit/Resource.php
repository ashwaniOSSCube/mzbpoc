<?php

class DimensionUnitField_Unit_Resource extends Pimcore_Model_Resource_Abstract {

    const TABLE_NAME = "plugin_dimensionunitfield_units";

    /**
     * Contains all valid columns in the database table
     *
     * @var array
     */
    protected $validColumns = array();

    /**
     * Get the valid columns from the database
     *
     * @return void
     */
    public function init() {
        $this->validColumns = $this->getValidTableColumns(self::TABLE_NAME);
    }

    /**
     * @param string $abbreviation
     * @return void
     */
    public function getByAbbreviation($abbreviation) {

        $classRaw = $this->db->fetchRow("SELECT * FROM " . self::TABLE_NAME . " WHERE abbreviation=" . $this->db->quote($abbreviation));
        if(empty($classRaw)) {
            throw new Exception("Unit " . $abbreviation . " not found.");
        }
        $this->assignVariablesToModel($classRaw);

    }

    /**
     * @param string $abbreviation
     * @return void
     */
    public function getById($id) {

        $classRaw = $this->db->fetchRow("SELECT * FROM " . self::TABLE_NAME . " WHERE id=" . $this->db->quote($id));
        if(empty($classRaw)) {
            throw new Exception("Unit " . $id . " not found.");
        }
        $this->assignVariablesToModel($classRaw);

    }


    /**
     * Create a new record for the object in database
     *
     * @return boolean
     */
    public function create() {
        $this->db->insert(self::TABLE_NAME, array());
        $this->model->setId($this->db->lastInsertId());

        $this->save();
    }

    /**
     * Save object to database
     *
     * @return void
     */
    public function save() {
        if ($this->model->getId()) {
            return $this->update();
        }
        return $this->create();
    }

    /**
     * @return void
     */
    public function update() {

        $class = get_object_vars($this->model);

        foreach ($class as $key => $value) {
            if (in_array($key, $this->validColumns)) {

                if (is_array($value) || is_object($value)) {
                    $value = serialize($value);
                } else  if(is_bool($value)) {
                    $value = (int)$value;
                }
                $data[$key] = $value;
            }
        }

        $this->db->update(self::TABLE_NAME, $data, "id=" . $this->db->quote($this->model->getId()));
    }

    /**
     * Deletes object from database
     *
     * @return void
     */
    public function delete() {
        $this->db->delete(self::TABLE_NAME, "id=" . $this->db->quote($this->model->getId()));
    }

}
