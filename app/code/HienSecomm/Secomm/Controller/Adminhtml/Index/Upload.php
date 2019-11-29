<?php
/**
 * Created by PhpStorm.
 * User: secomm-dev
 * Date: 11/21/19
 * Time: 3:18 PM
 */

namespace HienSecomm\Secomm\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\Filesystem\DirectoryList;

class Upload extends Action
{
    protected $_fileUploaderFactory;

    /**
     * @var \Magento\Framework\Filesystem
     */
    private $_filesystem;

    /**
     * @var \Magento\Framework\Controller\Result\JsonFactory
     */
    private $_resultJsonFactory;

    public function __construct(
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\Framework\Filesystem $filesystem,
        Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory
    ) {
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_filesystem = $filesystem;
        $this->_resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $uploader = $this->_fileUploaderFactory->create(['fileId' => 'feature_image']);

        $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);

        $uploader->setAllowRenameFiles(false);

        $uploader->setFilesDispersion(false);

        $path = $this->_filesystem->getDirectoryRead(DirectoryList::MEDIA)->getAbsolutePath('/images');
        $result = $this->_resultJsonFactory->create();

        $data = $uploader->save($path);
        $data['url']= '/pub/media/images/' . $data['name'];
        $result->setData($data);
        return $result;
    }
}
