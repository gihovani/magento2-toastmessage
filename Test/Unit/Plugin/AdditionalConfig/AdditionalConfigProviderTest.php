<?php

declare(strict_types=1);

namespace Gg2\ToastMessage\Test\Unit\Plugin\AdditionalConfig;

use Gg2\ToastMessage\Plugin\AdditionalConfig\AdditionalConfigProvider;
use Gg2\ToastMessage\ViewModel\Settings;
use Magento\Checkout\Model\DefaultConfigProvider;
use PHPUnit\Framework\TestCase;

class AdditionalConfigProviderTest extends TestCase
{

    private Settings $settings;

    private AdditionalConfigProvider $object;

    protected function setUp(): void
    {
        $this->settings = $this->createMock(Settings::class);
        $this->object = new AdditionalConfigProvider(
            $this->settings
        );
    }

    public function testAfterGetConfig(): void
    {
        $configProvider = $this->createMock(DefaultConfigProvider::class);

        $this->settings
            ->expects($this->once())
            ->method('getSettings')
            ->willReturn(['somedata' => 'data']);

        $result = $this->object->afterGetConfig($configProvider, []);

        $this->assertArrayHasKey('toastMessageSettings', $result);
    }
}
