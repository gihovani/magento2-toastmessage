<?php

namespace Gg2\ToastMessage\Test\Unit\Block\Adminhtml\System\Config;

use Gg2\ToastMessage\Block\Adminhtml\System\Config\Form\Field\ColorPicker;
use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class ColorPickerTest extends TestCase
{
    /**
     * object
     *
     * @var ColorPicker
     */
    private $object;

    /**
     * @var AbstractElement|MockObject
     */
    private $elementMock;

    /**
     * setUp
     *
     * @return void
     */
    protected function setUp() : void
    {
        $this->elementMock = $this->getMockBuilder(AbstractElement::class)
            ->disableOriginalConstructor()
            ->setMethods([
                'generateElementId',
                'getHtmlId',
                'getName',
                'getEscapedValue',
                'serialize',
                '_escape',
                '_getUiId'
            ])
            ->getMock();

        $context = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->object = new ColorPicker($context);
    }

    /**
     * testIsInstanceOfField
     *
     * @return void
     */
    public function testIsInstanceOfField(): void
    {
        $this->assertInstanceOf(Field::class, $this->object);
    }

    /**
     * testGetConfig
     *
     * @return void
     */
    public function testRender()
    {
        $htmlId = 'test-color-picker';
        $this->elementMock
            ->expects($this->any())
            ->method('getHtmlId')
            ->willReturn($htmlId);

        $expected = 'let $el = $("#' . $htmlId . '");';
        $render = $this->object->render($this->elementMock);
        $this->assertStringContainsString($expected, $render);
    }
}
