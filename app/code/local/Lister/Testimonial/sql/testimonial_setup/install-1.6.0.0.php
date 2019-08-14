<?php
$installer = $this;

$installer->startSetup();



/**
 * Create table 'customer_testimonial'
 */
$table = $installer->getConnection()
    ->newTable($installer->getTable('testimonial/testimonial'))
    ->addColumn('testimonial_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'unsigned'  => true,
        'nullable'  => false,
        'primary'   => true,
        ), 'Testimonial Id')
    ->addColumn('product_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'unsigned'  => true,
        'nullable'  => false,
        'default'   => '0',
        ), 'Product Id')
    ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Name')
    ->addColumn('email', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Email')
    ->addColumn('dial', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Dial')
    ->addColumn('remark', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
        ), 'Remark')
    ->addIndex($installer->getIdxName('testimonial/testimonial', array('testimonial_id')),
        array('testimonial_id'))
    ->setComment('Customer Testimonials');
$installer->getConnection()->createTable($table);

$installer->endSetup();
