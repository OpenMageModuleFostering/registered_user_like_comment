<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('likes')};
CREATE TABLE {$this->getTable('likes')} (
  `like_id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL default '0',
  `user_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`like_id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  ");

$installer->endSetup();
