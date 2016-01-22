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


class OnlineShop_Framework_FilterService_ElasticSearch_SelectRelation extends OnlineShop_Framework_FilterService_SelectRelation {

    public function prepareGroupByValues(OnlineShop_Framework_AbstractFilterDefinitionType $filterDefinition, OnlineShop_Framework_IProductList $productList) {
        $productList->prepareGroupByValues($filterDefinition->getField(), true);
    }

    protected function loadAllAvailableRelations($availableRelations, $availableRelationsArray = array()) {
        foreach($availableRelations as $rel) {
            if($rel instanceof \Pimcore\Model\Object\Folder) {
                $availableRelationsArray = $this->loadAllAvailableRelations($rel->getChilds(), $availableRelationsArray);
            } else {
                $availableRelationsArray[$rel->getId()] = true;
            }
        }
        return $availableRelationsArray;
    }


    public function addCondition(OnlineShop_Framework_AbstractFilterDefinitionType $filterDefinition, OnlineShop_Framework_IProductList $productList, $currentFilter, $params, $isPrecondition = false) {
        $field = $this->getField($filterDefinition);
        $preSelect = $this->getPreSelect($filterDefinition);


        $value = $params[$field];

        if(empty($value) && !$params['is_reload']) {
            $o = $preSelect;
            if(!empty($o)) {
                if(is_object($o)) {
                    $value = $o->getId();
                } else {
                    $value = $o;
                }

            }
        } else if($value == OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING) {
            $value = null;
        }

        $currentFilter[$field] = $value;


        if(!empty($value)) {
            $productList->addRelationCondition($field, $value);
        }

        return $currentFilter;
    }
}
