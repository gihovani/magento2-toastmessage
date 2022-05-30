<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Model\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;

class Transition extends DataObject implements OptionSourceInterface
{
    /**
     * Generate list of Transitions
     *
     * @return array
     */
    public function toOptionArray(): array
    {
        return [
            ['value' => 'fade', 'label' => __('Fade')],
            ['value' => 'slide', 'label' => __('Slide')],
            ['value' => 'plain', 'label' => __('Plain')],
        ];
    }
}
