<?php

namespace Gg2\ToastMessage\Block;

use Gg2\ToastMessage\Helper\Data;
use Magento\Framework\Message\CollectionFactory;
use Magento\Framework\Message\Factory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Message\InterpretationStrategyInterface;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Element\Template\Context;

class Message extends Messages
{
    const MAGENTO_DEFAULT_TEMPLATE = 'Magento_Theme::messages.phtml';

    /**
     * @var Data
     */
    protected $messageHelper;

    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    public function __construct(
        Context $context,
        Factory $messageFactory,
        CollectionFactory $collectionFactory,
        ManagerInterface $messageManager,
        InterpretationStrategyInterface $interpretationStrategy,
        Data $messageHelper,
        array $data = []
    ) {
        parent::__construct(
            $context,
            $messageFactory,
            $collectionFactory,
            $messageManager,
            $interpretationStrategy,
            $data
        );
        $this->messageManager = $messageManager;
        $this->messageHelper = $messageHelper;
        if (!$messageHelper->isActive()) {
            $this->setTemplate(self::MAGENTO_DEFAULT_TEMPLATE);
        }
    }

    /**
     * @return array
     */
    public function getToastMessageOptions(): array
    {
        return [
            'post_messages' => $this->getPostMessages(),
            'settings' => $this->getSettings()
        ];
    }

    /**
     * @return array
     */
    public function getSettings(): array
    {
        return $this->messageHelper->getToastMessageOptions();
    }

    /**
     * @return array
     */
    public function getPostMessages(): array
    {
        $toastMessages = [];
        foreach ($this->messageManager->getMessages()->getItems() as $message) {
            $toastMessages[] = ['type' => $message->getType(), 'text' => $message->getText()];
        }
        return $toastMessages;
    }
}
