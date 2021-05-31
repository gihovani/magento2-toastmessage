<?php

namespace Gg2\ToastMessage\Test\Unit\Model;

use Gg2\ToastMessage\Model\AdditionalConfigProvider;
use Gg2\ToastMessage\ViewModel\Settings;
use Magento\Checkout\Model\ConfigProviderInterface;
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
        $settings = $this->getMockBuilder(Settings::class)
                ->disableOriginalConstructor()
                ->getMock();
        $this->object = new AdditionalConfigProvider($settings);
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
