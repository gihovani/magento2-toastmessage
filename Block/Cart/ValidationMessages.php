<?php

namespace Gg2\ToastMessage\Block\Cart;

use Gg2\ToastMessage\Block\Message;
use Gg2\ToastMessage\Helper\Data;
use Magento\Checkout\Helper\Cart;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Locale\CurrencyInterface;
use Magento\Framework\Message\CollectionFactory;
use Magento\Framework\Message\Factory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Message\MessageInterface;
use Magento\Framework\View\Element\Message\InterpretationStrategyInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Quote\Model\Quote\Validator\MinimumOrderAmount\ValidationMessage;

class ValidationMessages extends Message
{
    /**
     * @var Cart
     */
    protected $cartHelper;

    /**
     * @var CurrencyInterface
     */
    protected $currency;

    /**
     * @var ValidationMessage
     */
    private $minimumAmountErrorMessage;

    public function __construct(
        Context $context,
        Factory $messageFactory,
        CollectionFactory $collectionFactory,
        ManagerInterface $messageManager,
        InterpretationStrategyInterface $interpretationStrategy,
        Data $messageHelper,
        Cart $cartHelper,
        CurrencyInterface $currency,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $messageFactory,
            $collectionFactory,
            $messageManager,
            $interpretationStrategy,
            $messageHelper,
            $data
        );
        $this->cartHelper = $cartHelper;
        $this->currency = $currency;
    }

    /**
     * @return ValidationMessages
     */
    protected function _prepareLayout()
    {
        if ($this->cartHelper->getItemsCount()) {
            $this->validateMinimumAmount();
            $this->addQuoteMessages();
            $this->addMessages($this->messageManager->getMessages(true));
        }
        return parent::_prepareLayout();
    }

    /**
     * @throws \Zend_Currency_Exception
     */
    protected function validateMinimumAmount()
    {
        if (!$this->cartHelper->getQuote()->validateMinimumAmount()) {
            $this->messageManager->addNoticeMessage($this->getMinimumAmountErrorMessage()->getMessage());
        }
    }

    /**
     * @return ValidationMessage
     * @deprecated 100.1.0
     */
    private function getMinimumAmountErrorMessage()
    {
        if ($this->minimumAmountErrorMessage === null) {
            $objectManager = ObjectManager::getInstance();
            $this->minimumAmountErrorMessage = $objectManager->get(
                ValidationMessage::class
            );
        }
        return $this->minimumAmountErrorMessage;
    }

    /**
     * Add quote messages
     *
     * @return void
     */
    protected function addQuoteMessages()
    {
        // Compose array of messages to add
        $messages = [];
        /** @var MessageInterface $message */
        foreach ($this->cartHelper->getQuote()->getMessages() as $message) {
            if ($message) {
                // Escape HTML entities in quote message to prevent XSS
                $message->setText($this->escapeHtml($message->getText()));
                $messages[] = $message;
            }
        }

        if ($messages) {
            $this->messageManager->addUniqueMessages($messages);
        }
    }
}
