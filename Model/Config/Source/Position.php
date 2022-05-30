<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Position extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of Positions
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'top-left', 'label' => __('Top Left')],
            ['value' => 'top-center', 'label' => __('Top Center')],
            ['value' => 'top-right', 'label' => __('Top Right')],
            ['value' => 'mid-center', 'label' => __('Center')],
            ['value' => 'bottom-left', 'label' => __('Bottom Left')],
            ['value' => 'bottom-center', 'label' => __('Bottom Center')],
            ['value' => 'bottom-right', 'label' => __('Bottom Right')]
        ];
    }
}
