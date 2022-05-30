<?php
declare(strict_types=1);

namespace Gg2\ToastMessage\Block;

use Gg2\ToastMessage\ViewModel\Settings;
use Magento\Framework\Message\CollectionFactory;
use Magento\Framework\Message\Factory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\View\Element\Message\InterpretationStrategyInterface;
use Magento\Framework\View\Element\Messages;
use Magento\Framework\View\Element\Template\Context;

class Message extends Messages
{
    const MAGENTO_DEFAULT_TEMPLATE = 'Magento_Theme::messages.phtml';
    protected Settings $settings;

    public function __construct(
        Context $context,
        Factory $messageFactory,
        CollectionFactory $collectionFactory,
        ManagerInterface $messageManager,
        InterpretationStrategyInterface $interpretationStrategy,
        Settings $settings,
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
        $this->settings = $settings;
        if (!$settings->isActive()) {
            $this->setTemplate(self::MAGENTO_DEFAULT_TEMPLATE);
        }
    }
}
