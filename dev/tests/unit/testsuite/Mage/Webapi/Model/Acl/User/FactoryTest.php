<?php
/**
 * Test class for Mage_Webapi_Model_Acl_User_Factory
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
class Mage_Webapi_Model_Acl_User_FactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Mage_Webapi_Model_Acl_User_Factory
     */
    protected $_model;

    /**
     * @var Magento_ObjectManager|PHPUnit_Framework_MockObject_MockObject
     */
    protected $_objectManager;

    /**
     * @var Mage_Webapi_Model_Acl_User
     */
    protected $_expectedObject;

    protected function setUp()
    {
        $helper = new Magento_Test_Helper_ObjectManager($this);

        $this->_objectManager = $this->getMockBuilder('Magento_ObjectManager')
            ->disableOriginalConstructor()
            ->setMethods(array('create'))
            ->getMockForAbstractClass();

        $this->_expectedObject = $this->getMockBuilder('Mage_Webapi_Model_Acl_User')
            ->disableOriginalConstructor()
            ->getMock();

        $this->_model = $helper->getModel('Mage_Webapi_Model_Acl_User_Factory', array(
            'objectManager' => $this->_objectManager,
        ));
    }

    /**
     * Test create method
     */
    public function testCreate()
    {
        $arguments = array('property' => 'value');
        $this->_objectManager->expects($this->once())
            ->method('create')
            ->with('Mage_Webapi_Model_Acl_User', $arguments)
            ->will($this->returnValue($this->_expectedObject));
        $this->assertEquals($this->_expectedObject, $this->_model->create($arguments));
    }
}
