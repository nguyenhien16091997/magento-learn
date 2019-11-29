<?php
namespace HienSecomm\Secomm\Block;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $_timezone;
    protected $urlBuilder;

    const URL_PATH_VIEW = 'secomm/blog/detail';

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \HienSecomm\Secomm\Model\PostFactory $postFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Framework\UrlInterface $urlBuilder
    ) {
        $this->_postFactory = $postFactory;
        $this->_timezone = $timezone;
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context);
    }

    public function getPost()
    {
        $post = $this->_postFactory->create();
        $collection = $post->getCollection();
        return $collection;
    }

    public function formatDateTimetoDate($datetime)
    {
        return $this->_timezone->date($datetime)->format('d-m-Y');
    }

    public function actionView($id)
    {
        return  $this->urlBuilder->getUrl(
            static::URL_PATH_VIEW,
            [
                'id' => $id
            ]
        );
    }
}
