<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Mageplaza\HelloWorld\Controller\Adminhtml\Post;

use Magento\Backend\App\Action;

class Edit extends \Magento\Backend\App\Action
{
    protected $request;

    public function __construct(
        Action\Context $context,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->request = $request;
        parent::__construct($context);
    }

    public function execute()
    {
        $id = $this->request->getParam('post_id');
        print_r($id);

        die;
    }
}
