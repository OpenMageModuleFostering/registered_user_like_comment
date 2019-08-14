<?php

class Lister_Testimonial_Block_Adminhtml_Testimonial_Edit_Tab_View extends Mage_Adminhtml_Block_Template
{ 
    
    public function getProduct()
    {
        return Mage::registry('testimonial_data')->getProduct_id();
    }
    
    public function getName()
    {
        return Mage::registry('testimonial_data')->getName();
    }
    
    public function getEmail()
    {
        return Mage::registry('testimonial_data')->getEmail();
    }
    
    public function getPhone()
    {
        return Mage::registry('testimonial_data')->getDial();
    }
    
    public function getRemark()
    {
        return Mage::registry('testimonial_data')->getRemark();
    }
    
    public function getStatus()
    {
        return Mage::registry('testimonial_data')->getStatus();
    }
    
}
?>