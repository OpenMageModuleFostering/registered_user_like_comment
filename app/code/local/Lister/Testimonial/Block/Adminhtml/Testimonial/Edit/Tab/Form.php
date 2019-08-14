<?php

class Lister_Testimonial_Block_Adminhtml_Testimonial_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{ 
   protected function _prepareForm()
    {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('testimonial_form', array('legend'=>Mage::helper('testimonial')->__('Item information')));
       
        $fieldset->addField('product_id', 'text', array(
            'label'     => Mage::helper('testimonial')->__('Product'),
            'name'      => 'product_id',
        ));
        
        $fieldset->addField('name', 'text', array(
            'label'     => Mage::helper('testimonial')->__('Name'),
            'name'      => 'name',
        ));
        
        $fieldset->addField('email', 'text', array(
            'label'     => Mage::helper('testimonial')->__('Email'),
            'name'      => 'email',
        ));
        
        $fieldset->addField('dial', 'text', array(
            'label'     => Mage::helper('testimonial')->__('Phone'),
            'name'      => 'dial',
        ));
        
        $fieldset->addField('remark', 'text', array(
            'label'     => Mage::helper('testimonial')->__('Remark'),
            'name'      => 'remark',
        ));
 
        $fieldset->addField('status', 'select', array(
            'label'     => Mage::helper('testimonial')->__('Status'),
            'name'      => 'status',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('testimonial')->__('Approved'),
                ),
 
                array(
                    'value'     => 0,
                    'label'     => Mage::helper('testimonial')->__('Rejected'),
                ),
            ),
        ));
       
        if ( Mage::getSingleton('adminhtml/session')->gettestimonialData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->gettestimonialData());
            Mage::getSingleton('adminhtml/session')->settestimonialData(null);
        } elseif ( Mage::registry('testimonial_data') ) {
            $form->setValues(Mage::registry('testimonial_data')->getData());
        }
        return parent::_prepareForm();
    }
}
?>