<?php

namespace Gg2\ToastMessage\Test\Unit\Model;

use Gg2\ToastMessage\Model\AdditionalConfigProvider;
use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\TestFramework\Unit\Helper\ObjectManager;
use PHPUnit\Framework\TestCase;

class AdditionalConfigProviderTest extends TestCase
{

    /**
     * object
     *
     * @var AdditionalConfigProvider
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
        $this->object = $objectManager->getObject(AdditionalConfigProvider::class);
    }

    /**
     * testIsInstanceOfConfigProviderInterface
     *
     * @return void
     */
    public function testIsInstanceOfConfigProviderInterface(): void
    {
        $this->assertInstanceOf(ConfigProviderInterface::class, $this->object);
    }

    /**
     * testGetConfig
     *
     * @return void
     */
    public function testGetConfig(): void
    {
        $this->assertArrayHasKey('toastMessageSettings', $this->object->getConfig());
    }
}
