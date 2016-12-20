<?php

/**
 * Created by nick
 * Project magento1.dev
 * Date: 12/9/16
 * Time: 5:35 PM
 */

class Stableflow_Company_Block_Company_List extends Stableflow_Company_Block_Company{

    protected $company = null;

    public function _construct(){
        parent::_construct();
        /** @var  $company Stableflow_Company_Model_Company */
        $company = Mage::getModel('company/company')->getCollection()
            ->addAttributeToSelect('*');
        //->addAttributeToFilter('status', 1);
        $this->setCompany($company);
    }

    protected function _prepareLayout(){
        parent::_prepareLayout();
        $this->getCompany()->load();
        return $this;
    }
}