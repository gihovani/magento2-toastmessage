<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Icon extends DataObject implements OptionSourceInterface
{

    /**
     * Generate list of email Icons
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => '', 'label' => __('No Icon')],
            ['value' => 'success', 'label' => __('Success')],
            ['value' => 'error', 'label' => __('Error')],
            ['value' => 'warning', 'label' => __('Warning')],
            ['value' => 'info', 'label' => __('Info')],
        ];
    }
}
