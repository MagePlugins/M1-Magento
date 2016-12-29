<?php
/**
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
 * @category    Mage
 * @package     Mage_Sendfriend
 * @copyright   Copyright (c) 2011 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */


/* @var $installer Mage_Sendfriend_Model_Mysql4_Setup */
$installer = $this;

$installer->startSetup();
$installer->getConnection()->dropKey($installer->getTable('sendfriend/sendfriend'), 'ip');
$installer->getConnection()->dropKey($installer->getTable('sendfriend/sendfriend'), 'time');
$installer->getConnection()->modifyColumn($installer->getTable('sendfriend/sendfriend'),
    'log_id', 'int(10) unsigned NOT NULL');
$installer->getConnection()->modifyColumn($installer->getTable('sendfriend/sendfriend'),
    'ip', 'bigint(20) NOT NULL DEFAULT 0');
$installer->getConnection()->modifyColumn($installer->getTable('sendfriend/sendfriend'),
    'time', 'int(10) unsigned NOT NULL');
$installer->getConnection()->addKey($installer->getTable('sendfriend/sendfriend'),
    'IDX_REMOTE_ADDR', array('ip'));
$installer->getConnection()->addKey($installer->getTable('sendfriend/sendfriend'),
    'IDX_LOG_TIME', array('time'));
$installer->endSetup();
