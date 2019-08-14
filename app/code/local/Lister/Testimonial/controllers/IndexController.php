<?php

class Lister_Testimonial_IndexController extends Mage_Core_Controller_Front_Action
{
    
    /**
     * Default customer account page
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function receiveAction()
    {
        $customerDetails=$this->getRequest()->getParams();
        $message = $this->__('Response recorded');
        Mage::getSingleton('core/session')->addSuccess($message);
         Mage::getModel('testimonial/feedbackmodel')->submitfeedback($customerDetails);
         $this->_redirectReferer();
    }
}
