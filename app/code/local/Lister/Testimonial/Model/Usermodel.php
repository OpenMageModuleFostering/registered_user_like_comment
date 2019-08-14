<?php


class Lister_Testimonial_Model_Usermodel extends Mage_Core_Model_Abstract
{ 
   protected function _construct()
     {
       $this->_init("testimonial/usermodel");
     }
   public function getuser()
   {
       $name = Mage::helper('customer')->getCustomerName();
       if(strcmp($name, " ")==0)
               return "Nope";
       else
       {
           $email = Mage::getSingleton('customer/session')->getCustomer()->getEmail();
           $billingaddress = Mage::getModel('customer/address')->load($visitorData->default_billing);
           $addressdata = $billingaddress ->getData();
           return $name.','.$email;
       }
   }
}
?>