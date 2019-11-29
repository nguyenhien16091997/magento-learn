<?php
namespace HienSecomm\Secomm\Block;

class Detail extends \Magento\Framework\View\Element\Template
{
    protected $_postFactory;
    protected $_timezone;
    protected $_request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \HienSecomm\Secomm\Model\PostFactory $postFactory,
        \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_postFactory = $postFactory;
        $this->_timezone = $timezone;
        $this->_request = $request;

        parent::__construct($context);
    }

    public function getPostById()
    {
        $id = $this->_request->getParam('id');
        $data = $this->_postFactory->create()->load($id)->getData();
        return $data;
    }

    public function formatDateTimetoDate($datetime)
    {
        return $this->_timezone->date($datetime)->format('d-m-Y');
    }
}
