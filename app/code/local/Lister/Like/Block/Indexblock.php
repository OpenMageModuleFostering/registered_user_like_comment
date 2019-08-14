<?php


class Lister_Like_Block_Indexblock extends Mage_Core_Block_Template
{ 
   public function getprodlikes()
   {
       $prodid = Mage::registry('current_product')->getId();
       $model = Mage::getModel("like/like")->getCollection()->addFieldToFilter('product_id',array(array('eq' => $prodid)));
       $count = 0;
       if ($model) {
           foreach ($model as $like) {
               $count++;
           }
       }
       if ($count==0)
           return "Be the first to like this";
       else if ($count==1)
           return $count." person likes this";
       else
           return $count." people like this";
   }
   public function getuser()
   {
       $user = Mage::getSingleton('customer/session')->getCustomerId();
       return $user;
   }
   public function getproduser()
   {
       return Mage::registry('current_product')->getId().",".Mage::getSingleton('customer/session')->getCustomerId();
   }
   public function getuserlike()
   {
       $prodid = Mage::registry('current_product')->getId();
       $user = Mage::getSingleton('customer/session')->getCustomerId();
       $model = Mage::getModel("like/like")->getCollection()->addFieldToFilter('product_id',array(array('eq' => $prodid)))->addFieldToFilter('user_id',array(array('eq' => $user)));
       $liked = 0;
       if ($model) {
           foreach ($model as $like) {
               $liked++;
           }
       }
       return $liked;
   }
}
?>