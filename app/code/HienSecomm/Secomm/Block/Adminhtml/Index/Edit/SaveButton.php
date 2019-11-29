<?php

namespace HienSecomm\Secomm\Block\Adminhtml\Index\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 */
class SaveButton extends \HienSecomm\Secomm\Block\Adminhtml\Index\Edit\GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return ['label' => __('Save Contact'),
            'class' => 'primary',
            'sort_order' => 90,
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'type'=>'submit'
        ];
    }
    public function getSaveUrl()
    {
        return $this->getUrl('*/*/save', []);
    }
}
