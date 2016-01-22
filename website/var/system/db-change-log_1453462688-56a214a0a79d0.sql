UPDATE `classes` SET `id` = 12, `name` = 'Product', `description` = '', `creationDate` = 1366282442, `modificationDate` = 1453462688, `userOwner` = 1, `userModification` = 3, `parentClass` = '', `useTraits` = '', `allowInherit` = 0, `allowVariants` = 0, `showVariants` = 0, `icon` = '/pimcore/static/img/icon/cart_add.png', `previewUrl` = '', `propertyVisibility` = 'a:2:{s:4:\"grid\";a:5:{s:2:\"id\";b:1;s:4:\"path\";b:1;s:9:\"published\";b:1;s:16:\"modificationDate\";b:1;s:12:\"creationDate\";b:1;}s:6:\"search\";a:5:{s:2:\"id\";b:1;s:4:\"path\";b:1;s:9:\"published\";b:1;s:16:\"modificationDate\";b:1;s:12:\"creationDate\";b:1;}}' WHERE (id = 12);

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_query_12` (
			  `oo_id` int(11) NOT NULL default '0',
			  `oo_classId` int(11) default '12',
			  `oo_className` varchar(255) default 'Product',
			  PRIMARY KEY  (`oo_id`)
			) DEFAULT CHARSET=utf8;

/*--NEXT--*/

ALTER TABLE `object_query_12` ALTER COLUMN `oo_className` SET DEFAULT 'Product';

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_store_12` (
			  `oo_id` int(11) NOT NULL default '0',
			  PRIMARY KEY  (`oo_id`)
			) DEFAULT CHARSET=utf8;

/*--NEXT--*/

CREATE TABLE IF NOT EXISTS `object_relations_12` (
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

ALTER TABLE `object_query_12` ADD COLUMN `product_name` varchar(255) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_name` varchar(255) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_name`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_name`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_desc` longtext NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_desc` longtext NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_desc`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_desc`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_image` int(11) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_image` int(11) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_image`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_image`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_price` bigint(20) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_price` bigint(20) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_price`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_price`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_cat` text NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_cat`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_cat`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_reviews` bigint(20) NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_reviews` bigint(20) NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_reviews`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_reviews`;

/*--NEXT--*/

ALTER TABLE `object_query_12` ADD COLUMN `product_reliability` double NULL;

/*--NEXT--*/

ALTER TABLE `object_store_12` ADD COLUMN `product_reliability` double NULL;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP INDEX `p_index_product_reliability`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP INDEX `p_index_product_reliability`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `artno`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `ean`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `size`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `brand__id`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `brand__type`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `gender`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `categories`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `features`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `technologies`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `attributes`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `collection`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `color`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `materialComposition`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `secondaryMaterialComposition`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `relatedProducts`;

/*--NEXT--*/

ALTER TABLE `object_query_12` DROP COLUMN `imagesInheritance`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `artno`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `ean`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `size`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `gender`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `color`;

/*--NEXT--*/

ALTER TABLE `object_store_12` DROP COLUMN `imagesInheritance`;

/*--NEXT--*/

CREATE OR REPLACE VIEW `object_12` AS SELECT * FROM `object_query_12` JOIN `objects` ON `objects`.`o_id` = `object_query_12`.`oo_id`;

/*--NEXT--*/

