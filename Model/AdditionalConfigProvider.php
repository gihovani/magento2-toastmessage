<?php

namespace Gg2\ToastMessage\Model;

use Gg2\ToastMessage\Helper\Data;

class AdditionalConfigProvider implements \Magento\Checkout\Model\ConfigProviderInterface
{
    /**
     * @var Data
     */
    private $messageHelper;

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
