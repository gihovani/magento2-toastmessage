<?php

namespace Gg2\ToastMessage\Test\Unit\Model\Config\Source;

use Gg2\ToastMessage\Model\Config\Source\TextAlignment;
use Magento\Framework\Data\OptionSourceInterface;
use Magento\Framework\DataObject;
use PHPUnit\Framework\TestCase;

class TextAlignmentTest extends TestCase
{

    /**
     * object
     *
     * @var TextAlignment
     */
    private $object;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $this->object = new TextAlignment();
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
