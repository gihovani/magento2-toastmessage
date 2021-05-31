<?php

namespace Gg2\ToastMessage\ViewModel;

use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Settings implements ArgumentInterface
{
    /**
     * @var Data
     */
    private $helper;

    public function __construct(Data $helper)
    {
        $this->helper = $helper;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return (bool)$this->helper->getConfig('general', Data::XML_PATH_ACTIVE);
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        if (!$this->isActive()) {
            return [];
        }

        $options = [
            'removeCookieAfter' => $this->helper->getConfig('general', Data::XML_PATH_REMOVECOOKIEAFTER),
        ];
        foreach (['success', 'notice', 'warning', 'error', 'info'] as $type) {
            $options[$type] = [
                'position' => $this->helper->getConfig($type, Data::XML_PATH_POSITION),
                'bgColor' => $this->helper->getConfig($type, Data::XML_PATH_BGCOLOR),
                'icon' => $this->helper->getConfig($type, Data::XML_PATH_ICON),
                'textAlign' => $this->helper->getConfig($type, Data::XML_PATH_TEXTALIGN),
                'textColor' => $this->helper->getConfig($type, Data::XML_PATH_TEXTCOLOR),
                'loader' => (bool)$this->helper->getConfig($type, Data::XML_PATH_LOADER),
                'loaderBg' => $this->helper->getConfig($type, Data::XML_PATH_LOADERBG),
                'hideAfter' => (int)$this->helper->getConfig($type, Data::XML_PATH_HIDEAFTER),
                'showHideTransition' => $this->helper->getConfig($type, Data::XML_PATH_SHOWHIDETRANSITION),
                'heading' => $this->helper->getConfig($type, Data::XML_PATH_HEADING)
            ];
        }
        return $options;
    }
}
