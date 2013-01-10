<?php
/**
 * Web API ACL role resource.
 *
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @copyright   Copyright (c) 2013 X.commerce, Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Mage_Webapi_Model_Resource_Acl_Role extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * @var Mage_Webapi_Helper_Data
     */
    protected $_helper;

    /**
     * Class constructor.
     *
     * @param Mage_Core_Model_Resource $resource
     * @param Mage_Webapi_Helper_Data $helper
     */
    public function __construct(Mage_Core_Model_Resource $resource, Mage_Webapi_Helper_Data $helper)
    {
        $this->_helper = $helper;
        parent::__construct($resource);
    }

    /**
     * Resource initialization.
     */
    protected function _construct()
    {
        $this->_init('webapi_role', 'role_id');
    }

    /**
     * Initialize unique fields.
     *
     * @return Mage_Webapi_Model_Resource_Acl_Role
     */
    protected function _initUniqueFields()
    {
        $this->_uniqueFields = array(
            array(
                'field' => 'role_name',
                'title' => $this->_helper->__('Role Name')
            ),
        );
        return $this;
    }

    /**
     * Get roles list for selects.
     *
     * @return array
     */
    public function getRolesList()
    {
        $adapter = $this->getReadConnection();
        $select = $adapter->select()
            ->from($this->getMainTable(), array($this->getIdFieldName(), 'role_name'))
            ->order('role_name');
        return $adapter->fetchPairs($select);
    }

    /**
     * Get all roles IDs.
     *
     * @return array
     */
    public function getRolesIds()
    {
        $adapter = $this->getReadConnection();
        $select = $adapter->select()->from($this->getMainTable(), array($this->getIdFieldName()));
        return $adapter->fetchCol($select);
    }
}
