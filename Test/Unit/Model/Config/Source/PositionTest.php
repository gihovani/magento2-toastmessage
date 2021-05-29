<?php

namespace Gg2\ToastMessage\Test\Unit\Model\Config\Source;

use Gg2\ToastMessage\Model\Config\Source\Position;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
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
        $objectManager = new ObjectManager($this);
        $this->object = $objectManager->getObject(Position::class);
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
