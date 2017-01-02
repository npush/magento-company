<?php

/**
 * Observer.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 1/2/17
 *
 */
class Stableflow_CustomMenu_Model_Observer extends Mage_Core_Model_Observer {

    /**
     * @param $form Varien_Data_Form
     * @param $attributeObject
     */
    public function addPositionToAttribute($form, $attributeObject){

        //create new custom fieldset 'website'
        /* @var $fieldset Varien_Data_Form_Element_Fieldset */
        $fieldset = $form->getForm()->getElement('base_fieldset');

        //add new website field
        $fieldset->addField('position_on_frontend', 'text', array(
            'name' => 'position_on_frontend',
            'label' => Mage::helper('catalog')->__('Position'),
            'title' => Mage::helper('catalog')->__('Position on Frontend'),
            'note' => Mage::helper('catalog')->__('Position of attribute in product view block'),
            'class' => 'validate-digits',
        ));
    }
}