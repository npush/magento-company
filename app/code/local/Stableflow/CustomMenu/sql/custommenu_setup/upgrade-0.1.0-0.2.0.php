<?php
/**
 * upgrade-0.1.0-0.2.0.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 1/2/17
 *
 */

$installer = $this;
$installer->startSetup();

$installer->getConnection()
    ->addColumn(
        $installer->getTable('catalog/eav_attribute'),
        'position_on_frontend',
        Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'nullable'  => false,
            'default'   => '0'
        ), 'Position on Frontend');
$installer->endSetup();