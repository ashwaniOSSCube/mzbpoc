<?php
/**
 * Pimcore
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2009-2015 pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GNU General Public License version 3 (GPLv3)
 */


class OnlineShop_Framework_ProductList_DefaultMockup {

    protected $id;
    protected $params;
    protected $relations;

    public function __construct($id, $params, $relations) {
        $this->id = $id;
        $this->params = $params;

        $this->relations = array();
        if($relations) {
            foreach($relations as $relation) {
                $this->relations[$relation['fieldname']][] = array("id" => $relation['dest'], "type" => $relation['type']);
            }
        }

    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $key
     *
     * @return mixed
     */
    public function getParam($key){
        return $this->params[$key];
    }
    /**
     * @param mixed $params
     *
     * @return $this
     */
    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    /**
     * @return array
     */
    public function getRelations()
    {
        return $this->relations;
    }

    /**
     * @param array $relations
     *
     * @return $this
     */
    public function setRelations($relations)
    {
        $this->relations = $relations;
        return $this;
    }



    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }



    public function getRelationAttribute($attributeName) {

        $relationObjectArray = array();
        if($this->relations[$attributeName]) {
            foreach($this->relations[$attributeName] as $relation) {
                $relationObject = \Pimcore\Model\Element\Service::getElementById($relation['type'], $relation['id']);
                if($relationObject) {
                    $relationObjectArray[] = $relationObject;
                }
            }
        }

        if(count($relationObjectArray) == 1) {
            return $relationObjectArray[0];
        } else if(count($relationObjectArray) > 1) {
            return $relationObjectArray;
        } else {
            return null;
        }

    }


    public function __call($method, $args) {

        if(substr($method, 0, 3) == "get") {
            $attributeName = lcfirst(substr($method, 3));
            if(is_array($this->params) && array_key_exists($attributeName, $this->params)) {
                return $this->params[$attributeName];
            }


            if(is_array($this->relations) && array_key_exists($attributeName, $this->relations)) {
                $relation = $this->getRelationAttribute($attributeName);
                if($relation) {
                    return $relation;
                }
            }

        }
     #  echo "Method $method not in Mockup implemented, delegating to object with id {$this->id}.<br/>";
        Logger::warn("Method $method not in Mockup implemented, delegating to object with id {$this->id}.");

        $object = $this->getOriginalObject();
        if($object) {
            return call_user_func_array(array($object, $method), $args);
        } else {
            throw new Exception("Object with {$this->id} not found.");
        }
    }


    public function getOriginalObject() {
        Logger::notice("Getting original object {$this->id}.");
        return \Pimcore\Model\Object\AbstractObject::getById($this->id);
    }

}