<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Plugin\AdditionalConfig;

use Gg2\ToastMessage\ViewModel\Settings;

class AdditionalConfigProvider
{
    private Settings $settings;

    /**
     * AdditionalConfigProvider constructor.
     * @param Settings $settings
     */
    public function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    /**
     * @param \Magento\Checkout\Model\DefaultConfigProvider $subject
     * @param $output
     * @return array
     * @SuppressWarnings("unused")
     */
    public function afterGetConfig(
        \Magento\Checkout\Model\DefaultConfigProvider $subject,
        $output
    ): array {
        $output['toastMessageSettings']  = $this->settings->getSettings();
        return $output;
    }
}
