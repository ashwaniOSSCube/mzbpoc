<?php


class OnlineShop_IndexService_Tenant_Config_MyOptimizedMysql extends OnlineShop_Framework_IndexService_Tenant_Config_OptimizedMysql {

    /**
     * @return string
     */
    public function getTablename() {
        return "plugin_onlineshop_optimized_productindex";
    }

    /**
     * @return string
     */
    public function getRelationTablename() {
        return "plugin_onlineshop_optimized_productindex_relations";
    }

    public function createMockupObject($objectId, $data, $relations) {
        return new Website_Product_Mockup($objectId, $data, $relations);
    }


}