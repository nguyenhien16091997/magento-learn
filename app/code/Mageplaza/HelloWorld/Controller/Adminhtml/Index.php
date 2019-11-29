<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Mageplaza\HelloWorld\Controller\Adminhtml;

use Magento\Customer\Controller\RegistryConstants;

abstract class Index extends \Magento\Backend\App\Action
{
    protected $_coreRegistry = null;

    /**
     * Index constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry)
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /**
     * Customer initialization
     *
     * @return string customer id
     */
    protected function initCurrentPost()
    {
        $postId = (int)$this->getRequest()->getParam('post_id');

        if ($postId) {
            $this->_coreRegistry->register(RegistryConstants::CURRENT_POST_ID, $postId);
        }

        return $postId;
    }
}
