<?php

class Lister_Testimonial_Block_Adminhtml_Testimonial extends Mage_Adminhtml_Block_Widget_Grid_Container
{ 
   public function __construct()
    {
        $this->_controller = 'adminhtml_testimonial';
        $this->_blockGroup = 'testimonial';
        $this->_headerText = Mage::helper('testimonial')->__('Testimonials'); 
        $this->_addButtonLabel = Mage::helper('testimonial')->__('Testimonials');
        parent::__construct(); 
        $this->_removeButton('add');
    }

    protected function _prepareLayout()
    {
        $this->setChild( 'grid',
            $this->getLayout()->createBlock( $this->_blockGroup.'/' . $this->_controller . '_grid',
            $this->_controller . '.grid')->setSaveParametersInSession(true) );
        return parent::_prepareLayout();
    }
}
?>