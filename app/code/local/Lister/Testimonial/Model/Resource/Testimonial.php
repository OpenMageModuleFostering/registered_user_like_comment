<?php

class Lister_Testimonial_Model_Resource_Testimonial extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('testimonial/testimonial', 'testimonial_id');
    }
}