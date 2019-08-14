<?php

class Lister_Testimonial_Block_Adminhtml_Testimonial_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{ 
   public function __construct()
    {
        parent::__construct();
        $this->setId('testimonial_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('testimonial')->__('Testimonials'));
    }
 
    protected function _beforeToHtml()
    {
        
        $this->addTab('form_view', array(
            'label'     => Mage::helper('testimonial')->__('View Testimonial'),
            'title'     => Mage::helper('testimonial')->__('View Testimonial'),
            'content'   => $this->getLayout()->createBlock('testimonial/adminhtml_testimonial_edit_tab_view')->setTemplate('testimonial/testimonial.phtml')->toHtml(),
        ));
        
        $this->addTab('form_section', array(
            'label'     => Mage::helper('testimonial')->__('Edit Testimonial'),
            'title'     => Mage::helper('testimonial')->__('Edit Testimonial'),
            'content'   => $this->getLayout()->createBlock('testimonial/adminhtml_testimonial_edit_tab_form')->toHtml(),
        ));
       
        return parent::_beforeToHtml();
    }
}
?>