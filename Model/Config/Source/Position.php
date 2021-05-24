<?php

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Position extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of email templates
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'top-left', 'label' => 'Top Left'],
            ['value' => 'top-center', 'label' => 'Top Center'],
            ['value' => 'top-right', 'label' => 'Top Right'],
            ['value' => 'mid-center', 'label' => 'Center'],
            ['value' => 'bottom-left', 'label' => 'Bottom Left'],
            ['value' => 'bottom-center', 'label' => 'Bottom Center'],
            ['value' => 'bottom-right', 'label' => 'Bottom Right']
        ];
    }
}
