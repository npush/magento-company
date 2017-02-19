<?php

/**
 * Grids.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 2/19/17
 *
 */
class Stableflow_CustomDashboard_Block_Adminhtml_Grids extends Mage_Adminhtml_Block_Dashboard_Grids{

    /**
     *
     */
    protected function _prepareLayout(){
        parent::_prepareLayout();
        $this->addTab('orders', array(
            'label'     => $this->__('Orders'),
            //                          */controller/action
            'url'       => $this->getUrl('*/orderinfo/index', array('_current'=>true)),
            'class'     => 'ajax'
        ));
    }
}