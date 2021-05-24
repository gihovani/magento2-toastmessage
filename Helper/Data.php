<?php

namespace Gg2\ToastMessage\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    const TYPE_SUCCESS = 'success';
    const TYPE_NOTICE = 'notice';
    const TYPE_WARNING = 'warning';
    const TYPE_ERROR = 'error';
    const TYPE_INFO = 'info';

    const XML_PATH_ACTIVE = 'gg2_toast/%s/active';
    const XML_PATH_POSITION = 'gg2_toast/%s/position';
    const XML_PATH_BGCOLOR = 'gg2_toast/%s/bgColor';
    const XML_PATH_ICON = 'gg2_toast/%s/icon';
    const XML_PATH_TEXTALIGN = 'gg2_toast/%s/textAlign';
    const XML_PATH_TEXTCOLOR = 'gg2_toast/%s/textColor';
    const XML_PATH_LOADER = 'gg2_toast/%s/loader';
    const XML_PATH_LOADERBG = 'gg2_toast/%s/loaderBg';
    const XML_PATH_HIDEAFTER = 'gg2_toast/%s/hideAfter';
    const XML_PATH_SHOWHIDETRANSITION = 'gg2_toast/%s/showHideTransition';
    const XML_PATH_HEADING = 'gg2_toast/%s/heading';

    /**
     * @return array
     */
    public function getToastMessageOptions(): array
    {
        if (!$this->isActive()) {
            return [];
        }
        $options = [];

        foreach (['success', 'notice', 'warning', 'error', 'info'] as $type) {
            $options[$type] = [
                'position' => $this->getConfig($type, self::XML_PATH_POSITION),
                'bgColor' => $this->getConfig($type, self::XML_PATH_BGCOLOR),
                'icon' => $this->getConfig($type, self::XML_PATH_ICON),
                'textAlign' => $this->getConfig($type, self::XML_PATH_TEXTALIGN),
                'textColor' => $this->getConfig($type, self::XML_PATH_TEXTCOLOR),
                'loader' => (bool)$this->getConfig($type, self::XML_PATH_LOADER),
                'loaderBg' => $this->getConfig($type, self::XML_PATH_LOADERBG),
                'hideAfter' => (int)$this->getConfig($type, self::XML_PATH_HIDEAFTER),
                'showHideTransition' => $this->getConfig($type, self::XML_PATH_SHOWHIDETRANSITION),
                'heading' => $this->getConfig($type, self::XML_PATH_HEADING)
            ];
        }
        return $options;
    }

    /**
     * @return mixed
     */
    public function isActive()
    {
        return $this->getConfig('general', self::XML_PATH_ACTIVE);
    }

    /**
     * @param string $type
     * @param string $key
     * @return mixed
     */
    public function getConfig(string $type, string $key)
    {
        $path = sprintf($key, $type);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
