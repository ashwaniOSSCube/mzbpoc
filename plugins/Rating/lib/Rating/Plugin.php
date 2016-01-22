<?php
/**
 * Pimcore
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.pimcore.org/license
 *
 * @copyright  Copyright (c) 2009-2011 elements.at New Media Solutions GmbH (http://www.elements.at)
 * @license    http://www.pimcore.org/license     New BSD License
 */
class Rating_Plugin extends Pimcore_API_Plugin_Abstract implements Pimcore_API_Plugin_Interface
{


    public static function install()
    {
        Pimcore_API_Plugin_Abstract::getDb()->exec("CREATE TABLE IF NOT EXISTS `plugin_rating_ratings` (
		`Id` INT NOT NULL AUTO_INCREMENT,
        `type` ENUM( 'object', 'asset', 'document' ) NOT NULL ,
		`ratingTargetId` INT NOT NULL ,
		`userId` INT NULL ,
		`data` INT NULL ,
        `classname` VARCHAR(255) NULL ,
		`date` INT NULL ,
			  PRIMARY KEY  (`id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;");

        Pimcore_API_Plugin_Abstract::getDb()->exec("ALTER TABLE `plugin_rating_ratings` ADD INDEX (classname), ADD INDEX (ratingTargetId), ADD INDEX (userId)");

        if (self::isInstalled()) {
            $statusMessage = "Rating Plugin successfully installed.";
        } else {
            $statusMessage = "Rating Plugin could not be installed";
        }
        return $statusMessage;

    }

    public static function uninstall()
    {
        Pimcore_API_Plugin_Abstract::getDb()->exec("DROP TABLE `plugin_rating_ratings`");

        if (!self::isInstalled()) {
            $statusMessage = "Rating Plugin successfully uninstalled.";
        } else {
            $statusMessage = "Rating Plugin could not be uninstalled";
        }
        return $statusMessage;

    }

    public static function isInstalled()
    {
        $result = null;
        try {
            $result = Pimcore_API_Plugin_Abstract::getDb()->describeTable("plugin_rating_ratings");
        }
        catch (Zend_Db_Statement_Exception $e) {
        }
        return !empty($result);
    }

    public static function getTranslationFileDirectory()
    {
        return PIMCORE_PLUGINS_PATH . "/Rating/texts";
    }

    public function preDeleteDocument(Document $document)
    {
        $this->deleteAllForTarget($document);
    }

    public function preDeleteObject(Object_Abstract $object)
    {
        $this->deleteAllForTarget($object);
    }

    public function preDeleteAsset(Asset $asset)
    {
        $this->deleteAllForTarget($asset);
    }

    /**
     * Deletes all ratings for a given targets
     * @param Pimcore_Model_WebResource_Interface $target
     */
    private function deleteAllForTarget($target)
    {

        $resourceRating = new Resource_Rating();
        $resourceRating->setRatingTarget($target);
        $resourceRating->deleteAllForTarget();

    }


    /**
     *
     * @param integer $value
     * @param integer $date
     * @param Pimcore_Model_WebResource_Interface $target
     * @param Object_Abstract $user
     */
    public static function postRating($value, $date, $target, $user = null)
    {

        $type = self::getTypeFromTarget($target);
        if (!empty($type)) {
            $rating = new Resource_Rating();
            $rating->setRatingTarget($target);
            if ($user instanceof Object_Concrete) {
                $rating->setUser($user);
            }
            $rating->setData($value);
            $rating->setDate($date);
            $rating->setType($type);
            if ($target instanceof Object_Abstract) {

                $rating->setClassname($target->getO_className());

            }

            $rating->save();
        } else {
            logger::log("Rating_Plugin: Could not post rating, unknown resource", Zend_Log::ERR);
        }

    }

    /**
     *
     * @param string $language
     * @return string path to the translation file relative to plugin direcory
     */
    public static function getTranslationFile($language)
    {
        if (is_file(PIMCORE_PLUGINS_PATH . "/Rating/texts/" . $language . ".csv")) {
            return "/Rating/texts/" . $language . ".csv";
        } else {
            return "/Rating/texts/en.csv";
        }
    }

    /**
     * @param integer amount
     * @param string $type
     * @param string $classname
     * @return Pimcore_Model_WebResource_Interface[] $target
     */
    public static function getTopTargets($amount, $type, $classname = null)
    {
        return Resource_Rating::getTopTargets($amount, $type, $classname);
    }


    /**
     * @param string $classname
     * @param string $type
     * @return interger $amount
     */
    public static function getTotalRatingsForTargetType($type, $classname = null)
    {
        return Resource_Rating_Resource_Mysql::getTotalRatingsForTargetType($type, $classname);
    }


    /**
     * @param Pimcore_Model_WebResource_Interface $target
     * @return integer amount
     */
    public static function getRatingValueForTarget($target)
    {
        $type = self::getTypeFromTarget($target);
        return Resource_Rating::getRatingValueForTarget($target, $type);
    }

    /**
     * @param Pimcore_Model_WebResource_Interface $target
     * @param User $user
     * @param integer $timestamp
     * @return integer amount
     *
     */
    public static function getRatingValueForTargetForUser($target, $user, $timestamp = null)
    {
        $type = self::getTypeFromTarget($target);
        return Resource_Rating::getRatingValueForTargetForUser($target, $type, $user, $timestamp);
    }


    /**
     *
     * @param Pimcore_Model_WebResource_Interface $target
     * @return integer $amount
     */
    public static function getRatingAmountForTarget($target)
    {
        $type = self::getTypeFromTarget($target);
        return Resource_Rating::getRatingAmountForTarget($target, $type);
    }

    /**
     * NEW
     * @param Pimcore_Model_WebResource_Interface $target
     * @return array $average
     */
    public static function getRatingAverageForTarget($target)
    {
        $type = self::getTypeFromTarget($target);
        return Resource_Rating::getRatingAverageForTarget($target, $type);
    }

    /**
     * NEW
     * @param Pimcore_Model_WebResource_Interface $target
     * @return array $average
     */
    public static function getRatingsAmountPerValueForTarget($target)
    {
        $type = self::getTypeFromTarget($target);
        return Resource_Rating::getRatingsAmountPerValueForTarget($target, $type);
    }

    /**
     *
     * @param Pimcore_Model_WebResource_Interface $ratingTarget
     * @param Object_Abstract $user
     */
    public static function hasRated($ratingTarget, $user)
    {
        $type = self::getTypeFromTarget($ratingTarget);
        return Resource_Rating::hasRated($ratingTarget, $type, $user);
    }

    /**
     *
     * @param Pimcore_Model_WebResource_Interface $target
     */
    private static function getTypeFromTarget($target)
    {
        $type = "";
        if ($target instanceof Document) {
            $type = "document";
        } else if ($target instanceof Asset) {
            $type = "asset";
        } else if ($target instanceof Object_Abstract) {
            $type = "object";
        }
        return $type;
    }

}
