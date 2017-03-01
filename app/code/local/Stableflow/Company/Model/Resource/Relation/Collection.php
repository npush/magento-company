<?php

/**
 * Created by nick
 * Project magento.dev
 * Date: 3/1/17
 * Time: 11:47 AM
 */
class Stableflow_Company_Model_Relation_Relation_Collection extends  Mage_Catalog_Model_Resource_Product_Collection{

    protected function _construct(){
        $this->_init('company/company_to_products');
    }
}