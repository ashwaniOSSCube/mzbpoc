<?php
/**
 * Pimcore
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.pimcore.org/license dsf sdaf asdf asdf
 *
 * @copyright  Copyright (c) 2009-2010 elements.at New Media Solutions GmbH (http://www.elements.at)
 * @license    http://www.pimcore.org/license     New BSD License
 */


include_once("pimcore/config/startup.php");

include_once(PIMCORE_WEBSITE_PATH."/lib/global_functions.php");


try {
	Pimcore::run();

} catch (Exception $e) {
    // handle exceptions, log to file
    if(class_exists("Logger")) {
    	Logger::emerg($e);
    }
   	throw $e;
}

?>