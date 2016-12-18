<?php

/**
 * Created by nick
 * Project magento1.dev
 * Date: 12/9/16
 * Time: 3:45 PM
 */
class Stableflow_Company_Model_Resource_Attribute extends Mage_Eav_Model_Resource_Attribute {

    /**
     * Get EAV website table
     *
     * Get table, where website-dependent attribute parameters are stored
     * If realization doesn't demand this functionality, let this function just return null
     *
     * @return string|null
     */
    protected function _getEavWebsiteTable()
    {
        //return $this->getTable('company/eav_attribute_website');
        return null;
    }

    /**
     * Get Form attribute table
     *
     * Get table, where dependency between form name and attribute ids is stored
     *
     * @return string|null
     */
    protected function _getFormAttributeTable()
    {
        //return $this->getTable('company/form_attribute');
        return null;
    }

    /**
     * after saving the attribute
     *
     * @access protected
     * @param Mage_Core_Model_Abstract $object
     * @return  Stableflow_Company_Model_Resource_Attribute
     */
    protected  function _afterSave(Mage_Core_Model_Abstract $object)
    {
        $setup       = Mage::getModel('eav/entity_setup', 'core_write');
        $entityType  = $object->getEntityTypeId();
        $setId       = $setup->getDefaultAttributeSetId($entityType);
        $groupId     = $setup->getDefaultAttributeGroupId($entityType);
        $attributeId = $object->getId();
        $sortOrder   = $object->getPosition();

        $setup->addAttributeToGroup($entityType, $setId, $groupId, $attributeId, $sortOrder);
        return parent::_afterSave($object);
    }
}