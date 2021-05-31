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
    const XML_PATH_REMOVECOOKIEAFTER = 'gg2_toast/%s/removeCookieAfter';
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
     * @param string $type
     * @param string $key
     * @return string|null
     */
    public function getConfig(string $type, string $key): ?string
    {
        $path = sprintf($key, $type);
        return $this->scopeConfig->getValue($path, ScopeInterface::SCOPE_STORE);
    }
}
