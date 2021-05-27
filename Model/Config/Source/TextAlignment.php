<?php

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class TextAlignment extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of Text Alignment
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'left', 'label' => __('Left')],
            ['value' => 'right', 'label' => __('Right')],
            ['value' => 'center', 'label' => __('Center')],
        ];
    }
}
