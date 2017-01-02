<?php

/**
 * Front.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 1/2/17
 *
 */
class Stableflow_CustomMenu_Block_Adminhtml_Catalog_Product_Attribute_Edit_Tab_Front extends Mage_Adminhtml_Block_Catalog_Product_Attribute_Edit_Tab_Front {

    protected function _prepareForm(){
        die('sdfsdf');
        parent::_prepareForm();
        $form = $this->getForm();
        $fieldset = $form->getElement('base_fieldset');
        $fieldset->addField('position_on_frontend', 'text', array(
            'name' => 'position_on_frontend',
            'label' => Mage::helper('catalog')->__('Position'),
            'title' => Mage::helper('catalog')->__('Position on Frontend'),
            'note' => Mage::helper('catalog')->__('Position of attribute in product view block'),
            'class' => 'validate-digits',
        ));
        $this->setForm($form);
        return $this;
    }
}