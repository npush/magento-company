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
        //Zend_Debug::dump($this->getResponse());
        //echo '<pre>' . $this->getResponse()->getBody() . '</pre>';
        die('Nnp_Hello_IndexController');
    }

    public function flatAction(){
        /*$resource = Mage::getSingleton('core/resource');
        $connection = $resource->getConnection('core_read');
        $results = $connection->query('SELECT * FROM review_detail')
            ->fetchAll();
        Zend_Debug::dump($results);*/

        $reviews = Mage::getModel('review/review')->getCollection();
        /** @var $_review Mage_Review_Model_Review */
        foreach ($reviews as $_review) {
            Zend_Debug::dump($_review->debug());
            echo $_review->getReviewUrl ();
        }
    }

    /**
     *
     */

    public function categoryAction(){
        $category = Mage::getModel('catalog/category');
        /** @var $category Mage_Catalog_Model_Category */

        $_helper = Mage::helper('catalog/category');
        /** @var $_helper Mage_Catalog_Helper_Category */

        $categories = $_helper->getStoreCategories();
        $rootCategoryId = Mage::app()->getStore()->getRootCategoryId();

        $category->load($rootCategoryId);
        print_r($category->getChildren());
        //print_r(Mage::app()->getStore()->getRootCategoryId());
        //printf('Category count: %s', $category->getPathInStore());
        //Zend_Debug::dump($category->getPathInStore());
        die();
    }

    public function eavAction(){

        /*
         * Create new blog post with author and title
         * -this will create new row in inchoo_blog_post_entity table and
         *  two entries for title and author attributes will be saved in inchoo_blog_post_entity_varchar table
         */
        /** @var $post Nnp_Hello_Model_Hello*/
        $post = Mage::getModel('hello/hello');
        $post->setTitle('Test title');
        $post->setAuthor('Zoran Šalamun');
        $post->save();
        /*
         * Try to create post with book type attribute
         * -book type attribute will not be saved because book type attribute is not defined for our entity type
         * -on new row will be added in inchoo_blog_post_entity
         */
        /** @var  $post Nnp_Hello_Model_Hello*/
        $post = Mage::getModel('hello/hello');
        $post->setBookType('Test title');
        $post->save();
        /*
         * Getting posts collection
         * -also load collection
         * -this will load all post entries but without attributes
         * -loaded data is only from inchoo_blog_post_entity table
         */
        $posts = Mage::getModel('hello/hello')->getCollection();
        $posts->load();
        var_dump($posts);
        /*
         * Getting post collection
         * -load all posts
         * -set attributs to be in collection data
         */
        $posts = Mage::getModel('hello/hello')->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('author');
        $posts->load();
        var_dump($posts);
        /*
         * Load signle post
         * -loading single post will get all attributes that we have set for post
         */
        $post = Mage::getModel('hello/hello')->load(1);
        var_dump($post);
    }
}