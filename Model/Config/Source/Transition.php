<?php

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Transition extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of email templates
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'fade', 'label' => 'Fade'],
            ['value' => 'slide', 'label' => 'Slide'],
            ['value' => 'plain', 'label' => 'Plain'],
        ];
    }
}
