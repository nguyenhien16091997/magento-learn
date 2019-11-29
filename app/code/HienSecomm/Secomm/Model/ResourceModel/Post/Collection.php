<?php
namespace HienSecomm\Secomm\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'entity_id';
    protected $_eventPrefix = 'hiensecomm_secomm_post_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('HienSecomm\Secomm\Model\Post', 'HienSecomm\Secomm\Model\ResourceModel\Post');
    }

}