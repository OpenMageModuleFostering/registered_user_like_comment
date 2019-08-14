<?php

class Lister_Testimonial_Model_Feedbackmodel extends Mage_Core_Model_Abstract
{
    public function submitfeedback($customerDetails)
    {
        $model = Mage::getModel("testimonial/testimonial");
        $model->setProduct_id($customerDetails["product"]);
        $model->setName($customerDetails["name"]);
        $model->setEmail($customerDetails["email"]);
        $model->setDial($customerDetails["phone"]);
        $model->setRemark($customerDetails["remark"]);
        $query = $model->save();
    }
}