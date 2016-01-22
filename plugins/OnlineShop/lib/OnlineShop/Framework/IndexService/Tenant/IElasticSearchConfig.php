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


/**
 * Interface for IndexService Tenant Configurations using elastic search as index
 *
 * Interface OnlineShop_Framework_IndexService_Tenant_IElasticSearchConfig
 */
interface OnlineShop_Framework_IndexService_Tenant_IElasticSearchConfig extends OnlineShop_Framework_IndexService_Tenant_IConfig {

    /**
     * returns elastic search client parameters defined in the tenant config
     *
     * @return array
     */
    public function getElasticSearchClientParams();


    /**
     * returns condition for current subtenant
     *
     * @return array
     */
    public function getSubTenantCondition();


    /**
     * creates and returns tenant worker suitable for this tenant configuration
     *
     * @return OnlineShop_Framework_IndexService_Tenant_Worker_ElasticSearch
     */
    public function getTenantWorker();

}