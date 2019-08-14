<?php

class Lister_Testimonial_Block_Adminhtml_Testimonial_Grid extends Mage_Adminhtml_Block_Widget_Grid
{ 
   public function __construct()
    {
        parent::__construct();
        $this->setId('testimonialGrid');
        $this->setDefaultSort('testimonial_id');
        $this->setDefaultDir('ASC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);
    }

    protected function _prepareCollection()
    {
        $collection = Mage::getModel('testimonial/testimonial')->getCollection(); 

        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('testimonial_id', array(
          'header'    => Mage::helper('testimonial')->__('ID'),
          'align'     =>'left',
          'index'     => 'testimonial_id',
        ));
        $this->addColumn('product_id', array(
            'header'    => Mage::helper('testimonial')->__('Product'),
            'align'     =>'left',
            'index'     => 'product_id',
        ));
        $this->addColumn('name', array(
            'header'    => Mage::helper('testimonial')->__('Name'),
            'align'     =>'left',
            'index'     => 'name',
        ));
        $this->addColumn('email', array(
            'header'    => Mage::helper('testimonial')->__('Email'),
            'align'     =>'left',
            'index'     => 'email',
        ));
        $this->addColumn('dial', array(
            'header'    => Mage::helper('testimonial')->__('Phone'),
            'align'     =>'left',
            'index'     => 'dial',
        ));
        $this->addColumn('remark', array(
            'header'    => Mage::helper('testimonial')->__('Remark'),
            'align'     =>'left',
            'index'     => 'remark',
        ));
        $this->addColumn('status', array(
            'header'    => Mage::helper('testimonial')->__('Status'),
            'align'     =>'left',
            'index'     => 'status',
            'type'      => 'options',
            'options'    => array('1' => 'Approved','2' => 'Rejected')
        ));
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('testimonial')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('testimonial')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    ),
                    array(
                        'caption'   => Mage::helper('testimonial')->__('View'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
        return parent::_prepareColumns();
    }
    
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
    
}
?>