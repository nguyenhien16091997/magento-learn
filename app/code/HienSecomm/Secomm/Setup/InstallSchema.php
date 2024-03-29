<?php
namespace HienSecomm\Secomm\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('blog_posts')) {
            $table = $installer->getConnection()->newTable(
                $installer->getTable('blog_posts')
            )
                ->addColumn(
                    'entity_id',
                    \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'nullable' => false,
                        'primary' => true,
                        'unsigned' => true,
                    ],
                    'Entity ID'
                )
                ->addColumn(
                    'title',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    225,
                    [],
                    'Title'
                )
                ->addColumn(
                    'feature_image',
                    \Magento\framework\DB\Ddl\Table::TYPE_TEXT,
                    225,
                    [],
                    'Feature Image'
                )
                ->addColumn(
                    'content',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                    '64k',
                    [],
                    'Content'
                )
                ->addColumn(
                    'created_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                    'Created At'
                )->addColumn(
                    'updated_at',
                    \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                    null,
                    ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                    'Updated At'
                )
                ->setComment('Post Table');
            $installer->getConnection()->CreateTable($table);

//            $installer->getConnection()->addIndex(
//                $installer->getTable('blog_posts'),
//                $setup->getIdxName(
//                    $installer->getTable('blog_posts'),
//                    ['title', 'feature_image', 'content', 'create_at', 'update_at'],
//                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//                ),
//                ['title', 'feature_image', 'content', 'create_at', 'update_at'],
//                \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
//            );
        }
        $installer->endSetup();
    }
}
