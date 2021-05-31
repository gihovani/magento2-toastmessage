<?php

namespace Gg2\ToastMessage\Test\Unit\ViewModel;

use Gg2\ToastMessage\ViewModel\Settings;
use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class SettingsTest extends TestCase
{
    /**
     * object
     *
     * @var Settings
     */
    private $object;

    /**
     * @var Data|MockObject
     */
    protected $helper;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->helper = $this->getMockBuilder(Data::class)
            ->setMethods(['getConfig'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $this->object = new Settings($this->helper);
    }

    /**
     * testIsInstanceOfMessagesAndArgumentInterface
     *
     * @return void
     */
    public function testIsInstanceOfMessagesAndArgumentInterface(): void
    {
        $this->assertInstanceOf(ArgumentInterface::class, $this->object);
        $this->assertInstanceOf(Settings::class, $this->object);
    }

    /**
     * testGetSettings
     *
     * @return void
     */
    public function testGetSettingsInactive(): void
    {
        $this->helper->expects($this->once())
            ->method('getConfig')
            ->willReturn(false);
        $this->assertEmpty($this->object->getSettings());
    }

    /**
     * testGetSettings
     *
     * @return void
     */
    public function testGetSettingsActive(): void
    {
        $this->helper->expects($this->any())
            ->method('getConfig')
            ->willReturn(true);
        $this->assertArrayHasKey('removeCookieAfter', $this->object->getSettings());
    }
}
