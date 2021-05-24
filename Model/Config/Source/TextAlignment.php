<?php

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class TextAlignment extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of email templates
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'left', 'label' => 'Left'],
            ['value' => 'right', 'label' => 'Right'],
            ['value' => 'center', 'label' => 'Center'],
        ];
    }
}
