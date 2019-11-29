<?php
/**
 * Created by PhpStorm.
 * User: secomm-dev
 * Date: 11/21/19
 * Time: 12:10 AM
 */
namespace HienSecomm\Secomm\Controller\Adminhtml\Index;

class Delete extends \Magento\Backend\App\Action
{
    protected $resultPageFactory = false;

    private $postFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \HienSecomm\Secomm\Model\PostFactory $postFactory
    ) {
        $this->postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->postFactory->create();
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the block.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/');
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a post to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
