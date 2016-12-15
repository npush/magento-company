<?php

/**
 * Created by nick
 * Project magento1.dev
 * Date: 12/9/16
 * Time: 12:07 PM
 */

class Stableflow_Company_Model_Resource_Setup extends Mage_Eav_Model_Entity_Setup{

    protected function _prepareValues($attr){
        $data = parent::_prepareValues($attr);
        $data = array_merge($data, array(
            'is_visible'                => $this->_getValue($attr, 'visible', 1),
            'is_system'                 => $this->_getValue($attr, 'system', 1),
            'input_filter'              => $this->_getValue($attr, 'input_filter', null),
            'multiline_count'           => $this->_getValue($attr, 'multiline_count', 0),
            'validate_rules'            => $this->_getValue($attr, 'validate_rules', null),
            'data_model'                => $this->_getValue($attr, 'data', null),
            'sort_order'                => $this->_getValue($attr, 'position', 0)
        ));
        return $data;
    }

    public function getDefaultEntities(){
        $entities = array(
            'company_company' => array(
                'entity_model' => 'company/company',
                'attribute_model' => 'company/attribute',
                'table' => 'company/company_entity',
                'additional_attribute_table' => 'company/eav_attribute',
                'entity_attribute_collection' => 'company/attribute_collection',
                'attributes' => array(
                    'name' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Name',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => true,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'url' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Site Url',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => false,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'description' => array(
                        'type' => 'text',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Description',
                        'input' => 'textarea',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'image'              => array(
                        'type'                       => 'varchar',
                        'label'                      => 'Image',
                        'input'                      => 'image',
                        'backend'                    => 'company/company_attribute_backend_image',
                        'required'                   => false,
                    ),
                    // example start
                    'manufacturer'       => array(
                        'type'                       => 'int',
                        'label'                      => 'Manufacturer',
                        'input'                      => 'select',
                        'required'                   => false,
                        'user_defined'               => true,
                        'searchable'                 => true,
                        'filterable'                 => true,
                        'comparable'                 => true,
                        'visible_in_advanced_search' => true,
                        'apply_to'                   => Mage_Catalog_Model_Product_Type::TYPE_SIMPLE,
                    ),
                    'visibility'         => array(
                        'type'                       => 'int',
                        'label'                      => 'Visibility',
                        'input'                      => 'select',
                        'source'                     => 'catalog/product_visibility',
                        'default'                    => '4',
                        'sort_order'                 => 12,
                        'global'                     => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                    ),
                    // example end
                    'company_code' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Company Code',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => false,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => false,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => false,
                        'unique' => true,
                    ),
                    'activity_id' => array(
                        'type'               => 'static',
                        'label'              => 'Company Activity',
                        'input'              => 'select',
                        'source'             => 'company/company_attribute_source_activity',
                        'backend'            => 'company/company_attribute_backend_activity',
                        'sort_order'         => 10,
                        'position'           => 10,
                        'adminhtml_only'     => 1,
                    ),
                    'type_id'   =>  array(
                        'type'               => 'static',
                        'label'              => 'Company Type',
                        'input'              => 'select',
                        'source'             => 'company/company_attribute_source_type',
                        'backend'            => 'company/company_attribute_backend_type',
                        'sort_order'         => 10,
                        'position'           => 10,
                        'adminhtml_only'     => 1,
                    ),
                    'customer_id'   =>  array(
                        'type'               => 'static',
                        'label'              => 'Associate to Customer',
                        'input'              => 'select',
                        'source'             => 'company/company_attribute_source_customer',
                        'backend'            => 'company/company_attribute_backend_customer',
                        'sort_order'         => 20,
                        'position'           => 20,
                        'adminhtml_only'     => 1,
                    ),
                    'address_id'    => array(
                        'type'               => 'int',
                        'label'              => 'Address',
                        'input'              => 'text',
                        'backend'            => 'customer/company_attribute_backend_address',
                        'required'           => false,
                        'sort_order'         => 82,
                        'visible'            => false,
                    ),
                    'price_id'    => array(
                        'type'               => 'int',
                        'label'              => 'Price Model',
                        'input'              => 'text',
                        'backend'            => 'customer/company_attribute_backend_price',
                        'required'           => false,
                        'sort_order'         => 82,
                        'visible'            => false,
                    ),
                ),
            ),
            'company_address' => array(
                'entity_model' => 'company/address',
                'attribute_model' => 'company/attribute',
                'table' => 'company/address_entity',
                'additional_attribute_table'     => 'company/eav_attribute',
                'entity_attribute_collection'    => 'company/attribute_collection',
                'attributes' => array(
                    'street'             => array(
                        'type'               => 'text',
                        'label'              => 'Street Address',
                        'input'              => 'multiline',
                        'backend'            => 'company/entity_address_attribute_backend_street',
                        'sort_order'         => 70,
                        'multiline_count'    => 2,
                        'validate_rules'     => 'a:2:{s:15:"max_text_length";i:255;s:15:"min_text_length";i:1;}',
                        'position'           => 70,
                    ),
                    'city'               => array(
                        'type'               => 'varchar',
                        'label'              => 'City',
                        'input'              => 'text',
                        'sort_order'         => 80,
                        'validate_rules'     => 'a:2:{s:15:"max_text_length";i:255;s:15:"min_text_length";i:1;}',
                        'position'           => 80,
                    ),
                    'country_id'         => array(
                        'type'               => 'varchar',
                        'label'              => 'Country',
                        'input'              => 'select',
                        'source'             => 'company/entity_address_attribute_source_country',
                        'sort_order'         => 90,
                        'position'           => 90,
                    ),
                    'email'              => array(
                        'type'               => 'static',
                        'label'              => 'Email',
                        'input'              => 'text',
                        'sort_order'         => 80,
                        'validate_rules'     => 'a:1:{s:16:"input_validation";s:5:"email";}',
                        'position'           => 80,
                        'admin_checkout'    => 1
                    ),
                    'postcode'           => array(
                        'type'               => 'varchar',
                        'label'              => 'Zip/Postal Code',
                        'input'              => 'text',
                        'sort_order'         => 110,
                        'validate_rules'     => 'a:0:{}',
                        'data'               => 'company/attribute_data_postcode',
                        'position'           => 110,
                    ),
                    'telephone'          => array(
                        'type'               => 'varchar',
                        'label'              => 'Telephone',
                        'input'              => 'text',
                        'sort_order'         => 120,
                        'validate_rules'     => 'a:2:{s:15:"max_text_length";i:255;s:15:"min_text_length";i:1;}',
                        'position'           => 120,
                    ),
                    'fax'                => array(
                        'type'               => 'varchar',
                        'label'              => 'Fax',
                        'input'              => 'text',
                        'required'           => false,
                        'sort_order'         => 130,
                        'validate_rules'     => 'a:2:{s:15:"max_text_length";i:255;s:15:"min_text_length";i:1;}',
                        'position'           => 130,
                    ),
                ),
            ),
            'company_prices' => array(
                'entity_model' => 'company/prices',
                'attribute_model' => 'company/attribute',
                'table' => 'company/prices_entity',
                'additional_attribute_table'     => 'company/eav_attribute',
                'entity_attribute_collection'    => 'company/attribute_collection',
                'attributes' => array(
                    'name' => array(
                        'type' => 'varchar',
                        'backend' => '',
                        'frontend' => '',
                        'label' => 'Name',
                        'input' => 'text',
                        'class' => '',
                        'source' => '',
                        'global' => 0,
                        'visible' => true,
                        'required' => true,
                        'user_defined' => true,
                        'default' => '',
                        'searchable' => true,
                        'filterable' => false,
                        'comparable' => false,
                        'visible_on_front' => true,
                        'unique' => false,
                    ),
                    'price' => array(

                    ),
                    'price_int' => array(

                    ),
                    'price_wholesale' => array(

                    ),
                ),
            ),
        );
        return $entities;
    }
}