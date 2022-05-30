<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Message\Session;
use Magento\Framework\Stdlib\CookieManagerInterface;
use Magento\Framework\Stdlib\Cookie\FailureToSendException;

/**
 * Class ClearMessages
 * @package Gg2\ToastMessage\Observer
 * @SuppressWarnings(PHPMD.CookieAndSessionMisuse)
 */
class ClearMessages implements ObserverInterface
{
    protected Session $session;
    protected CookieManagerInterface $cookieManager;

    /**
     * ClearMessages constructor.
     * @param Session $session
     * @param CookieManagerInterface $cookieManager
     */
    public function __construct(
        Session $session,
        CookieManagerInterface $cookieManager
    )
    {
        $this->session = $session;
        $this->cookieManager = $cookieManager;
    }

    /**
     * @param Observer $observer
     * @throws InputException
     * @throws FailureToSendException
     * @SuppressWarnings("unused")
     */
    public function execute(Observer $observer)
    {
        $messages = $this->session->getData('default');
        if ($messages && !empty($messages->getItems())) {
            $messages->clear();
            $this->cookieManager->deleteCookie('mage-messages');
        }
    }
}
