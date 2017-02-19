<?php

/**
 * List.php
 * Free software
 * Project: magento.dev
 *
 * Created by: nick
 * Copyright (C) 2017
 * Date: 2/19/17
 *
 */
class Stableflow_CustomDashboard_Block_Adminhtml_Orders_List extends Mage_Adminhtml_Block_Dashboard_Grid{

    public function __construct(){
        parent::__construct();
        $this->setId('ordersListGrid');
    }

    protected function _prepareCollection(){

        $collection = Mage::getResourceModel('sales/order_collection');
        /* @var $collection Mage_Reports_Model_Mysql4_Order_Collection */
//        $collection
//            ->groupByCustomer()
//            ->addOrdersCount()
//            ->joinCustomerName();

//        $collection->addFieldToFilter('status', array('nin' => array('canceled','complete')));
//        $collection->addFieldToFilter('store_id', array(Mage::app()->getStore((int)$this->getParam('store'))->getId()));
        $collection->getSelect()
            ->columns('SUM(grand_total) as orders_sum_amount,COUNT(*) AS orders_qty')
            ->group('main_table.status');
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns(){

        $baseCurrencyCode = (string) Mage::app()->getStore((int)$this->getParam('store'))->getBaseCurrencyCode();

        $this->addColumn('id', array(
            'header' => $this->__('#'),
            'width' => '50px',
            'sortable' => false,
        ));

        $this->addColumn('status', array(
            'header' => $this->__('Order status'),
            'width' => '250px',
            'sortable' => false,
            'index' => 'status'
        ));

        $this->addColumn('orders_qty', array(
            'header' => $this->__('Orders Total (qty)'),
            'sortable' => false,
            'align'     => 'right',
            'index' => 'orders_qty'
        ));

        $this->addColumn('orders_sum_amount', array(
            'header'    => $this->__('Total Order Amount'),
            'align'     => 'right',
            'width'     => '200px',
            'sortable'  => false,
            'type'      => 'currency',
            'currency_code'  => $baseCurrencyCode,
            'index'     => 'orders_sum_amount'
        ));

        $this->setFilterVisibility(false);
        $this->setPagerVisibility(false);

        return parent::_prepareColumns();
    }
}