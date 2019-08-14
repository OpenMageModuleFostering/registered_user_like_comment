<?php

class Lister_Like_IndexController extends Mage_Core_Controller_Front_Action
{
    
    /**
     * Default customer account page
     */
    public function indexAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function aaaAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }
    public function unlikeAction()
    {
        $data = explode(",", $this->getRequest()->getParam("data"));
        $prodid = $data[0];
        $user = $data[1];
        $model = Mage::getModel("like/like")->getCollection()->addFieldToFilter('product_id',array(array('eq' => $prodid)))->addFieldToFilter('user_id',array(array('eq' => $user)));
        $rowid = 0;
        foreach($model as $row) {
            $rowid = $row->getlike_id();
        }
        Mage::getModel("like/like")->setId($rowid)->delete();
        $this->_redirectReferer();
    }
    public function likeAction()
    {
        $data = explode(",", $this->getRequest()->getParam("data"));
        $prodid = $data[0];
        $user = $data[1];
        $model = Mage::getModel("like/like");
        $model->setProduct_id($prodid);
        $model->setUser_id($user);
        $model->save();
        $this->_redirectReferer();
    }
}
