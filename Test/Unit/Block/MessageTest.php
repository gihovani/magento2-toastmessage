<?php

namespace Gg2\ToastMessage\Test\Unit\Block;

use Gg2\ToastMessage\Block\Message;
use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use Magento\Framework\View\Element\Messages;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class MessageTest extends TestCase
{
    /**
     * object
     *
     * @var Message
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
            ->setMethods(['isActive', 'getConfig'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $objectManager = new ObjectManager($this);
        $this->object = $objectManager->getObject(
            Message::class,
            [
                'messageHelper' => $this->helper
            ]
        );
    }

    /**
     * testIsInstanceOfMessages
     *
     * @return void
     */
    public function testIsInstanceOfMessages(): void
    {
        $this->assertInstanceOf(Messages::class, $this->object);
    }

    /**
     * testGetSettings
     *
     * @return void
     */
    public function testGetSettingsInactive(): void
    {
        $this->helper->expects($this->once())
            ->method('isActive')
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
        $this->helper->expects($this->once())
            ->method('isActive')
            ->willReturn(true);
        $this->assertArrayHasKey('removeCookieAfter', $this->object->getSettings());
    }
}
