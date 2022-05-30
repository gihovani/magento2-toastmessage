<?php

namespace Gg2\ToastMessage\Test\Unit\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Stdlib\Cookie\FailureToSendException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Gg2\ToastMessage\Observer\ClearMessages;
use Magento\Framework\Message\Session;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Message\Collection;


/**
 * Class ClearMessageTest
 * @package Gg2\ToastMessage\Test\Unit\Observer
 */
class ClearMessageTest extends TestCase
{
    /**
     * @var ClearMessages
     */
    protected ClearMessages $observer;

    /**
     * @var Session|MockObject
     */
    protected $session;

    /**
     * @var CookieManagerInterface|MockObject
     */
    protected $cookie;

    /**
     * @var Collection|MockObject
     */
    protected $messages;


    public function setUp(): void
    {
        $this->session = $this->createMock(Session::class);
        $this->cookie = $this->createMock(CookieManagerInterface::class);
        $this->messages = $this->createMock(Collection::class);

        $this->session->expects($this->once())
            ->method('getData')
            ->will($this->returnValue($this->messages));

        $this->messages->expects($this->once())
            ->method('getItems')
            ->will($this->returnValue($this->session));

        $this->messages->expects($this->once())
            ->method('clear')
            ->will($this->returnValue($this->session));

        $this->cookie->expects($this->once())
            ->method('deleteCookie');

        $this->observer = new ClearMessages(
            $this->session,
            $this->cookie,
        );


    }

    /**
     * @throws InputException
     * @throws FailureToSendException
     */
    public function testExecute()
    {
        $param = $this->createMock(Observer::class);
        $this->observer->execute($param);
    }
}
