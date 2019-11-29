<?php
namespace HienSecomm\Secomm\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'hiensecomm_secomm_post';

    protected $_cacheTag = 'hiensecomm_secomm_post';

    protected $_eventPrefix = 'hiensecomm_secomm_post';

    protected function _construct()
    {
        $this->_init('HienSecomm\Secomm\Model\ResourceModel\Post');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}