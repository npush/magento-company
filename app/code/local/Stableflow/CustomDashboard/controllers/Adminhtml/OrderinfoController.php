<?php

/**
 * OrderinfoController.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 2/19/17
 *
 */
class Stableflow_CustomDashboard_Adminhtml_OrderinfoController extends Mage_Adminhtml_Controller_Action{

    /**
     * constructor - set the used module name
     *
     * @access protected
     * @return void
     * @see Mage_Core_Controller_Varien_Action::_construct()
     * @author nick
     */
    protected function _construct(){
        $this->setUsedModuleName('Stableflow_CustomDashboard');
    }


    /**
     * default action for company controller
     *
     * @access public
     * @return void
     * @author Sam
     */
    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
    }
}