<?php

namespace Gg2\ToastMessage\Test\Unit\Model\Config\Source;

use Gg2\ToastMessage\Model\Config\Source\Position;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;
use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{

    /**
     * object
     *
     * @var Position
     */
    private $object;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->object = new Position();
    }

    /**
     * testIsInstanceOfDataObjectAndOptionSourceInterface
     *
     * @return void
     */
    public function testIsInstanceOfDataObjectAndOptionSourceInterface(): void
    {
        $this->assertInstanceOf(DataObject::class, $this->object);
        $this->assertInstanceOf(OptionSourceInterface::class, $this->object);
    }

    /**
     * testGetConfig
     *
     * @return void
     */
    public function testToOptionArray(): void
    {
        foreach ($this->object->toOptionArray() as $item) {
            $this->assertArrayHasKey('value', $item);
            $this->assertArrayHasKey('label', $item);
        }
    }
}
