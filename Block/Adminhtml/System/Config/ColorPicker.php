<?php

namespace Gg2\ToastMessage\Block\Adminhtml\System\Config;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{

    /**
     * @param Context $context
     * @param array $data
     */
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element): string
    {
        $html = $element->getElementHtml();
        $value = $element->getData('value');

        $html .= '<script type="text/javascript">
            require(["jquery","jquery/colorpicker/js/colorpicker"], function ($) {
                $(document).ready(function () {
                    let $el = $("#' . $element->getHtmlId() . '");
                    $el.css("backgroundColor", "' . $value . '");

                    // Attach the color picker
                    $el.ColorPicker({
                        color: "' . $value . '",
                        onChange: function (event, hex, rgb) {
                            $el.css("backgroundColor", "#" + hex).val("#" + hex);
                        }
                    });
                });
            });
            </script>';
        return $html;
    }
}
