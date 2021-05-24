<?php

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Icon extends DataObject implements OptionSourceInterface
{

    /**
     * Generate list of email templates
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => '', 'label' => 'No Icon'],
            ['value' => 'success', 'label' => 'Success'],
            ['value' => 'error', 'label' => 'Error'],
            ['value' => 'warning', 'label' => 'Warning'],
            ['value' => 'info', 'label' => 'Info'],
        ];
    }
}
