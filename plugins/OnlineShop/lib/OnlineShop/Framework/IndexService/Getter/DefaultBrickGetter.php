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


class OnlineShop_Framework_IndexService_Getter_DefaultBrickGetter implements OnlineShop_Framework_IndexService_Getter {

    public static function get($object, $config = null) {
        $brickContainerGetter = "get" . ucfirst($config->brickfield);
        $brickContainer = $object->$brickContainerGetter();

        $brickGetter = "get" . ucfirst($config->bricktype);
        $brick = $brickContainer->$brickGetter();
        if($brick) {
            $fieldGetter = "get" . ucfirst($config->fieldname);
            return $brick->$fieldGetter();
        }
    }

}
