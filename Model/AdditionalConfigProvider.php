<?php

namespace Gg2\ToastMessage\Model;

use Gg2\ToastMessage\Helper\Data;
use Magento\Checkout\Model\ConfigProviderInterface;

class AdditionalConfigProvider implements ConfigProviderInterface
{
    /**
     * @var Data
     */
    private $messageHelper;

    /**
     * AdditionalConfigProvider constructor.
     * @param Data $messageHelper
     */
    public function __construct(Data $messageHelper)
    {
        $this->messageHelper = $messageHelper;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'toastMessageSettings' => $this->messageHelper->getSettings()
        ];
    }
}
