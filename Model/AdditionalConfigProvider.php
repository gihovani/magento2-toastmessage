<?php

namespace Gg2\ToastMessage\Model;

use Gg2\ToastMessage\ViewModel\Settings;
use Magento\Checkout\Model\ConfigProviderInterface;

class AdditionalConfigProvider implements ConfigProviderInterface
{
    /**
     * @var Settings
     */
    private $settings;

    /**
     * AdditionalConfigProvider constructor.
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return [
            'toastMessageSettings' => $this->settings->getSettings()
        ];
    }
}
