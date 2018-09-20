<?php
/**
 * Copyright � 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Hirenkava\Custompayment\Setup;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory /* For Attribute create  */;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
/**
 * @codeCoverageIgnore
 */
class UpgradeSchema implements UpgradeSchemaInterface
{
	/**
     * EAV setup factory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;
    /**
     * Init
     *
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory; 
        /* assign object to class global variable for use in other class methods */
    }
    /**
     * {@inheritdoc}
     */
    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
		if (version_compare($context->getVersion(), '1.0.0', '<')) {
			$setup->getConnection()->addColumn(
				$setup->getTable('quote_payment'),
				'evoucher',
				[
				'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'length'=>255,
				'nullable'=>true,
				'comment'=>'eVoucher'
				]
			);	
			
			$setup->getConnection()->addColumn(
				$setup->getTable('quote_payment'),
				'voucher_amount',
				[
				'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'length'=>255,
				'nullable'=>true,
				'comment'=>'Voucher Amount'
				]
			);
			
			$setup->getConnection()->addColumn(
				$setup->getTable('sales_order_payment'),
				'evoucher',
				[
					'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'length'=>255,
					'nullable'=>true,
					'comment'=>'eVoucher'
				]
			);	
			
			$setup->getConnection()->addColumn(
				$setup->getTable('sales_order_payment'),
				'voucher_amount',
				[
				'type'=>\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
				'length'=>255,
				'nullable'=>true,
				'comment'=>'Voucher Amount'
				]
			);
		}
		$setup->endSetup();
    }
}
