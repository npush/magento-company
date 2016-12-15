<?php

/**
 * IndexController.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2016
 * Date: 10/27/16
 *
 */
class Nnp_Hello_IndexController extends Mage_Core_Controller_Front_Action{

    public function indexAction(){
        $this->loadLayout();
        $this->renderLayout();
	echo '<pre>';
	debug_print_backtrace();
	echo '</pre>';
        echo "Index Action";
    }

    public function flatAction(){
        /*$resource = Mage::getSingleton('core/resource');
        $connection = $resource->getConnection('core_read');
        $results = $connection->query('SELECT * FROM review_detail')
            ->fetchAll();
        Zend_Debug::dump($results);*/

        $reviews = Mage::getModel('review/review')->getCollection();
        foreach ($reviews as $_review) {
            Zend_Debug::dump($_review->debug());
            echo $_review->getReviewUrl();
        }
	$config = Mage::getModel('core/config');
	$resourceConfig = $config->getResourceModel();
	Zend_Debug::dump($config->getConfig('*'));
    }
}
