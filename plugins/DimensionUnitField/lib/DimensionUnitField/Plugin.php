<?php 

class DimensionUnitField_Plugin extends Pimcore_API_Plugin_Abstract implements Pimcore_API_Plugin_Interface {

    /**
     * @return string $jsClassName
     */
    public static function getJsClassName(){
        return "pimcore.plugin.dimensionUnitField";
    }

    /**
     * absolute path to the folder holding plugin translation files
     * @static
     * @return string
     */
    public static function getTranslationFileDirectory() {
        return PIMCORE_PLUGINS_PATH."/DimensionUnitField/texts";
    }

    /**
    *
    * @param string $language
    * @return string path to the translation file relative to plugin direcory
    */
	public static function getTranslationFile($language){
        if($language == "de"){
            return "/DimensionUnitField/texts/de.csv";
        } else if($language == "en"){
            return "/DimensionUnitField/texts/en.csv";
        } else {
            return null;
        }
    }

    /**
     * @return string $statusMessage
     */
    public static function install() {
        $db = Pimcore_Resource::get();

        $db->query("CREATE TABLE `plugin_dimensionunitfield_units` (
              `id` bigint(20) NOT NULL AUTO_INCREMENT,
              `group` varchar(50) COLLATE utf8_bin DEFAULT NULL,
              `abbreviation` varchar(10) COLLATE utf8_bin NOT NULL,
              `longname` varchar(250) COLLATE utf8_bin DEFAULT NULL,
              `baseunit` varchar(10) COLLATE utf8_bin DEFAULT NULL,
              `factor` double DEFAULT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
        ");

    }

    /**
     * @return boolean $isInstalled
     */
    public static function isInstalled() {
		$result = null;
		try{
			$result = Pimcore_API_Plugin_Abstract::getDb()->describeTable("plugin_dimensionunitfield_units");
		} catch(Zend_Db_Exception $e){}
		return !empty($result);
    }

    /**
     * @return boolean $needsReloadAfterInstall
     */
    public static function needsReloadAfterInstall() {
        return true;
    }

    /**
     * @return boolean $readyForInstall
     */
    public static function readyForInstall() {
        return !self::isInstalled();
    }

    /**
     * @return string $statusMessage
     */
    public static function uninstall() {
        $db = Pimcore_Resource::get();
        $db->exec("DROP TABLE IF EXISTS `plugin_dimensionunitfield_units`;");
    }

}


