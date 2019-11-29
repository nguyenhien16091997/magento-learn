<?php
/**
 * Created by PhpStorm.
 * User: secomm-dev
 * Date: 11/20/19
 * Time: 10:20 AM
 */

namespace HienSecomm\Secomm\Block\Adminhtml\Index\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class ResetButton
 */
class ResetButton extends \HienSecomm\Secomm\Block\Adminhtml\Index\Edit\GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Reset'),
            'class' => 'secondary',
            'on_click' => 'location.reload();',
            'sort_order' => 30
        ];
    }
}
