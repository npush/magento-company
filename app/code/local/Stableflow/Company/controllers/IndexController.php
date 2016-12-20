<?php

/**
 * Created by nick
 * Project magento1.dev
 * Date: 12/9/16
 * Time: 12:18 PM
 */
class Stableflow_Company_IndexController extends Mage_Core_Controller_Front_Action {

    public function indexoldAction(){
        $companies = Mage::getModel('company/company')->getCollection()
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('description');
        $companies->load();
        //var_dump($companies);
        foreach($companies as $company){
            echo '<div>';
            echo '<h3>'.$company->getName().'</h3>';
            echo '<h3>'.$company->getDescription().'</h3>';
            echo '<h3>'.$company->getActivity().'</h3>';
            echo '</div>';
        }
    }

    public function indexAction(){
        $this->loadLayout();
        $headBlock = $this->getLayout()->getBlock('head');
        if ($headBlock) {
            $headBlock->setTitle('Companyes');
        }
        $this->renderLayout();
    }

    public function addAction(){
        /** @var  $companies Stableflow_Company_Model_Company */
        $companies = Mage::getModel('company/company');
        $companies->setName('Demo Company 2');
        $companies->setDescription('Description ha ha ha 2');
        $companies->setData('activity','3');
        $companies->setData('type','3');
        $companies->setData('url','http://magento.dev/company2');
        $companies->save();
    }
}