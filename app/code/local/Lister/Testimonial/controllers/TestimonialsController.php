<?php

class Lister_Testimonial_TestimonialsController extends Mage_Core_Controller_Front_Action
{
    
    /**
     * Default customer account page
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
}
