<?php


class Lister_Testimonial_Block_Indexblock extends Mage_Core_Block_Template
{ 
   public function getuser()
   {
       $prod = Mage::registry('current_product')->getId();
       return Mage::getModel("testimonial/usermodel")->getuser().','.$prod;
   }
   public function getfeedbacks()
   {
       $feed = Mage::getModel("testimonial/testimonial")->getCollection()->addFieldToFilter('status',array(array('eq' => 'Approved')));
       return $feed;
   }
   public function getprodfeedbacks()
   {
       $prodid = Mage::registry('current_product')->getId();
       $feed = Mage::getModel("testimonial/testimonial")->getCollection()->addFieldToFilter('status',array(array('eq' => 'Approved')))->addFieldToFilter('product_id',array(array('eq' => $prodid)));
       return $feed;
   }
}
?>