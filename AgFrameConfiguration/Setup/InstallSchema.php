<?php
/**
 * Grid Schema Setup.
 * @category  ArtGalerie
 * @package   ArtGalerie_AgFrameConfiguration
 * @author    ArtGalerie
 * @copyright Copyright (c) ArtGalerie Software Private Limited 
 * @license   
 */
 
namespace ArtGalerie\AgFrameConfiguration\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\App\Filesystem\DirectoryList;
 
/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     *
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
 
        $installer->startSetup();
 
        /*
         * Create table 'ag_frames'
         */
 
        $table = $installer->getConnection()->newTable(
            $installer->getTable('ag_frame_configuration')
        )->addColumn(
            'id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Id'
        )->addColumn(
            'product_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['nullable' => false],
            'Product Id'
        )->addColumn(
            'user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'User Id'
        )->addColumn(
            'configuration',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Configuration'
        )->addColumn(
            'medium',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => false],
            'Medium'
        )->addColumn(
            'grobe',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Größe'
        )->addColumn(
            'rahmen',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Rhamen'
        )->addColumn(
            'passepartout',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Passepartout'
        )->addColumn(
            'doppelpassepartout',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Doppelpassepartout'
        )->addColumn(
            'oberflache',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            ['nullable' => true],
            'Oberfläche'
        )->addColumn(
            'created_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Creation Time'
        )->addColumn(
            'updated_at',
            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
            null,
            [],
            'Updated Time'
        )->setComment(
            'Art Galerie Configuration Table'
        );
        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}