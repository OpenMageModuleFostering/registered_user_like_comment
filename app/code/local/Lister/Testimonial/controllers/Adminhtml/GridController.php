<?php

class Lister_Testimonial_Adminhtml_GridController extends Mage_Adminhtml_Controller_Action
{
    protected function _initAction()
    {
        // load layout, set active menu and breadcrumbs
        $this->loadLayout()
            ->_setActiveMenu('testimonial')
            ->_addBreadcrumb(Mage::helper('testimonial')->__('Testimonial'), Mage::helper('testimonial')->__('Testimonial'))
            ;
        return $this;
    }
    
    public function indexAction()
    {
        $this->_title($this->__('Testimonial'));
        $this->_initAction();
        $this->renderLayout();
    }
    
    public function editAction()
    {
        $testimonialId     = $this->getRequest()->getParam('id');
        $testimonialModel  = Mage::getModel('testimonial/testimonial')->load($testimonialId);
 
        if ($testimonialModel->getId() || $testimonialId == 0) {
 
            Mage::register('testimonial_data', $testimonialModel);
 
            $this->loadLayout();
            $this->_setActiveMenu('testimonial/items');
           
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
            $this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));
           
            $this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
           
            $this->_addContent($this->getLayout()->createBlock('testimonial/adminhtml_testimonial_edit'))
                 ->_addLeft($this->getLayout()->createBlock('testimonial/adminhtml_testimonial_edit_tabs'));
               
            $this->renderLayout();
        } else {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('testimonial')->__('Item does not exist'));
            $this->_redirect('*/*/');
        }
    }
    
    public function saveAction()
    {
        if ( $this->getRequest()->getPost() ) {
            try {
                $postData = $this->getRequest()->getPost();
                $testimonialModel = Mage::getModel('testimonial/testimonial');
                
                if($postData['status']==1)
                {
                    $testimonialModel->setId($this->getRequest()->getParam('id'))
                    ->setProduct_id($postData['product_id'])
                    ->setName($postData['name'])
                    ->setEmail($postData['email'])
                    ->setDial($postData['dial'])
                    ->setRemark($postData['remark'])
                    ->setStatus("Approved")
                    ->save();
                }
                else
                {
                    $testimonialModel->setId($this->getRequest()->getParam('id'))
                    ->setProduct_id($postData['product_id'])
                    ->setName($postData['name'])
                    ->setEmail($postData['email'])
                    ->setDial($postData['dial'])
                    ->setRemark($postData['remark'])
                    ->setStatus("Rejected")
                    ->save();
                }
               
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully saved'));
                Mage::getSingleton('adminhtml/session')->settestimonialData(false);
 
                $this->_redirect('*/*/');
                return;
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                Mage::getSingleton('adminhtml/session')->settestimonialData($this->getRequest()->getPost());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
                return;
            }
        }
        $this->_redirect('*/*/');
    }
    
    public function deleteAction()
    {
        if( $this->getRequest()->getParam('id') > 0 ) {
            try {
                $testimonialModel = Mage::getModel('testimonial/testimonial');
               
                $testimonialModel->setId($this->getRequest()->getParam('id'))
                    ->delete();
                   
                Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
                $this->_redirect('*/*/');
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
            }
        }
        $this->_redirect('*/*/');
    }
    
}

