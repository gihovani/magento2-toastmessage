<?php

namespace Gg2\ToastMessage\Test\Unit\Block;

use Gg2\ToastMessage\Block\Message;
use Gg2\ToastMessage\ViewModel\Settings;
use Magento\Framework\Message\CollectionFactory;
use Magento\Framework\Message\Factory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Message\InterpretationStrategyInterface;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Element\Template\Context;
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
     * setUp
     *
     * @return void
     */
    public function setUp(): void
    {
        $context = $this->getMockBuilder(Context::class)
            ->disableOriginalConstructor()
            ->getMock();

        $messageFactory = $this->getMockBuilder(Factory::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $collectionFactory = $this->getMockBuilder(CollectionFactory::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $messageManager = $this->getMockBuilder(ManagerInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $interpretationStrategy = $this->getMockBuilder(InterpretationStrategyInterface::class)
            ->disableOriginalConstructor()
            ->getMockForAbstractClass();

        $settings = $this->getMockBuilder(Settings::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->object = new Message(
            $context,
            $messageFactory,
            $collectionFactory,
            $messageManager,
            $interpretationStrategy,
            $settings
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
}
