<?php

namespace Gg2\ToastMessage\Test\Unit\Helper;

use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
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
    protected function setUp() : void
    {
        $this->scopeConfig = $this->getMockBuilder(ScopeConfigInterface::class)
            ->setMethods(['getValue'])
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $context = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();
        $context
            ->method('getScopeConfig')
            ->willReturn($this->scopeConfig);

        $this->object = new Data($context);
    }

    /**
     * testIsInstanceOfAbstractHelper
     *
     * @return void
     */
    public function testIsInstanceOfAbstractHelper(): void
    {
        $this->assertInstanceOf(AbstractHelper::class, $this->object);
    }

    /**
     * testGetConfigReturnValue
     *
     * @return void
     */
    public function testGetConfigReturnValue(): void
    {
        $value = 'xyz';
        $this->scopeConfig->expects($this->any())
            ->method('getValue')
            ->willReturn($value);
        $this->assertEquals($value, $this->object->getConfig('x', 'y'));
    }

    /**
     * testGetConfigReturnValue
     *
     * @return void
     */
    public function testGetConfigReturnNull(): void
    {
        $value = null;
        $this->scopeConfig->expects($this->any())
            ->method('getValue')
            ->willReturn($value);
        $this->assertNull($this->object->getConfig('x', 'y'));
    }
}
