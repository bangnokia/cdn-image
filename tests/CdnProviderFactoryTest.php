<?php

namespace BangNokia\CdnImage\Tests;

use BangNokia\CdnImage\CdnProviderFactory;
use BangNokia\CdnImage\CdnProviders\StaticallyCdnProvider;

class CdnProviderFactoryTest extends TestCase
{
    /** @test */
    public function test_it_can_create_cdn_provider_instance()
    {
        $instance = CdnProviderFactory::makeProvider('statically');

        $this->assertInstanceOf(StaticallyCdnProvider::class, $instance);
    }
}
