<?php

/**
 * HelloBlock.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2016
 * Date: 10/27/16
 *
 */
class Nnp_Hello_Block_Hello extends Mage_Core_Block_Template{

    public function getProducts(){
        $products = Mage::getModel('catalog/product')->getCollection()
            ->addAttributeToSelect('*')
            ->setOrder('created_at')
            ->setPageSize(5);
        return $products;
    }

    public function getVolume(){
        return $this->volume;
    }

    public function setVolume($volume){
        $this->volume = $volume;
    }
}