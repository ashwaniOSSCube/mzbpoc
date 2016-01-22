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


class OnlineShop_Framework_FilterService_ElasticSearch_SelectFromMultiSelect extends OnlineShop_Framework_FilterService_SelectFromMultiSelect {

    public function prepareGroupByValues(OnlineShop_Framework_AbstractFilterDefinitionType $filterDefinition, OnlineShop_Framework_IProductList $productList) {
        $productList->prepareGroupByValues($filterDefinition->getField(), true);
    }

    public function addCondition(OnlineShop_Framework_AbstractFilterDefinitionType $filterDefinition, OnlineShop_Framework_IProductList $productList, $currentFilter, $params, $isPrecondition = false) {
        $field = $this->getField($filterDefinition);
        $preSelect = $this->getPreSelect($filterDefinition);

        $value = $params[$field];

        if($value == OnlineShop_Framework_FilterService_AbstractFilterType::EMPTY_STRING) {
            $value = null;
        } else if(empty($value) && !$params['is_reload']) {
            $value = $preSelect;
        }

        $value = trim($value);

        $currentFilter[$field] = $value;


        if(!empty($value)) {
            $value =  ".*\"" . OnlineShop_Framework_IndexService_Tenant_IWorker::MULTISELECT_DELIMITER  . $value .  OnlineShop_Framework_IndexService_Tenant_IWorker::MULTISELECT_DELIMITER . "\".*";
            $productList->addCondition(['regexp' => ["attributes." . $field => $value]], $field);
        }
        return $currentFilter;
    }
}
