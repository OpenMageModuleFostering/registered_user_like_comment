<?php

$installer = $this;
/* @var $installer Mage_Core_Model_Resource_Setup */

$installer->startSetup();

$installer->run("

-- DROP TABLE IF EXISTS {$this->getTable('testimonial')};
CREATE TABLE {$this->getTable('testimonial')} (
  `testimonial_id` int(10) unsigned NOT NULL auto_increment,
  `product_id` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `dial` varchar(255) NOT NULL default '',
  `remark` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`testimonial_id`),
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

  ");

$installer->endSetup();
