INSERT INTO `classes` (`name`) VALUES ('category');

/*--NEXT--*/

UPDATE `classes` SET `id` = 36, `name` = 'category', `description` = '', `creationDate` = 1453462687, `modificationDate` = 1453462687, `userOwner` = '', `userModification` = 3, `parentClass` = '', `useTraits` = '', `allowInherit` = 0, `allowVariants` = 0, `showVariants` = 0, `icon` = '/pimcore/static/img/icon/neighbourhood.png', `previewUrl` = '', `propertyVisibility` = 'a:2:{s:4:\"grid\";a:5:{s:2:\"id\";b:1;s:4:\"path\";b:1;s:9:\"published\";b:1;s:16:\"modificationDate\";b:1;s:12:\"creationDate\";b:1;}s:6:\"search\";a:5:{s:2:\"id\";b:1;s:4:\"path\";b:1;s:9:\"published\";b:1;s:16:\"modificationDate\";b:1;s:12:\"creationDate\";b:1;}}' WHERE (id = 36);

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_query_36` (
			  `oo_id` int(11) NOT NULL default '0',
			  `oo_classId` int(11) default '36',
			  `oo_className` varchar(255) default 'category',
			  PRIMARY KEY  (`oo_id`)
			) DEFAULT CHARSET=utf8;

/*--NEXT--*/

ALTER TABLE `object_query_36` ALTER COLUMN `oo_className` SET DEFAULT 'category';

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_store_36` (
			  `oo_id` int(11) NOT NULL default '0',
			  PRIMARY KEY  (`oo_id`)
			) DEFAULT CHARSET=utf8;

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_relations_36` (
          `src_id` int(11) NOT NULL DEFAULT '0',
          `dest_id` int(11) NOT NULL DEFAULT '0',
          `type` varchar(50) NOT NULL DEFAULT '',
          `fieldname` varchar(70) NOT NULL DEFAULT '0',
          `index` int(11) unsigned NOT NULL DEFAULT '0',
          `ownertype` enum('object','fieldcollection','localizedfield','objectbrick') NOT NULL DEFAULT 'object',
          `ownername` varchar(70) NOT NULL DEFAULT '',
          `position` varchar(70) NOT NULL DEFAULT '0',
          PRIMARY KEY (`src_id`,`dest_id`,`ownertype`,`ownername`,`fieldname`,`type`,`position`),
          KEY `index` (`index`),
          KEY `src_id` (`src_id`),
          KEY `dest_id` (`dest_id`),
          KEY `fieldname` (`fieldname`),
          KEY `position` (`position`),
          KEY `ownertype` (`ownertype`),
          KEY `type` (`type`),
          KEY `ownername` (`ownername`)
        ) DEFAULT CHARSET=utf8;

/*--NEXT--*/

ALTER TABLE `object_query_36` ADD COLUMN `category_name` varchar(255) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_36` ADD COLUMN `category_name` varchar(255) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_36` DROP INDEX `p_index_category_name`;

/*--NEXT--*/

ALTER TABLE `object_store_36` DROP INDEX `p_index_category_name`;

/*--NEXT--*/

ALTER TABLE `object_query_36` ADD COLUMN `category_desc` longtext NULL;

/*--NEXT--*/

ALTER TABLE `object_store_36` ADD COLUMN `category_desc` longtext NULL;

/*--NEXT--*/

ALTER TABLE `object_query_36` DROP INDEX `p_index_category_desc`;

/*--NEXT--*/

ALTER TABLE `object_store_36` DROP INDEX `p_index_category_desc`;

/*--NEXT--*/

ALTER TABLE `object_query_36` ADD COLUMN `category_img` int(11) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_36` ADD COLUMN `category_img` int(11) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_36` DROP INDEX `p_index_category_img`;

/*--NEXT--*/

ALTER TABLE `object_store_36` DROP INDEX `p_index_category_img`;

/*--NEXT--*/

ALTER TABLE `object_query_36` ADD COLUMN `category_brand` text NULL;

/*--NEXT--*/

ALTER TABLE `object_query_36` DROP INDEX `p_index_category_brand`;

/*--NEXT--*/

ALTER TABLE `object_store_36` DROP INDEX `p_index_category_brand`;

/*--NEXT--*/

CREATE OR REPLACE VIEW `object_36` AS SELECT * FROM `object_query_36` JOIN `objects` ON `objects`.`o_id` = `object_query_36`.`oo_id`;

/*--NEXT--*/

