<?php

namespace Gg2\ToastMessage\Test\Unit\Helper;

use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DataTest extends TestCase
{

    /**
     * object
     *
     * @var Data
     */
    private $object;

    /**
     * @var ScopeConfigInterface|MockObject
     */
    private $scopeConfig;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->scopeConfig = $this->getMockBuilder(ScopeConfigInterface::class)
            ->setMethods(['getValue'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $objectManager = new ObjectManager($this);
        $this->object = $objectManager->getObject(
            Data::class,
            [
                'scopeConfig' => $this->scopeConfig
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
        $this->assertInstanceOf(Data::class, $this->object);
    }

    /**
     * testIsInActive
     *
     * @return void
     */
    public function testIsInActive(): void
    {
        $this->scopeConfig->expects($this->once())
            ->method('getValue')
            ->willReturn(false);

        $this->assertEquals(false, $this->object->isActive());
    }

    /**
     * testGetSettings
     *
     * @return void
     */
    public function testGetSettings(): void
    {
        $this->scopeConfig->expects($this->any())
            ->method('getValue')
            ->willReturn(true);
        $this->assertArrayHasKey('removeCookieAfter', $this->object->getSettings());
    }
}
