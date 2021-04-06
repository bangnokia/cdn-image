<?php

namespace BangNokia\CdnImage;

use BangNokia\CdnImage\CdnProviders\StaticallyCdnProvider;
use BangNokia\CdnImage\Contracts\CdnProvider;
use InvalidArgumentException;

class CdnProviderFactory
{
    public static function makeProvider(string $providerName): CdnProvider
    {
        switch ($providerName) {
            case 'statically':
                return new StaticallyCdnProvider();
//            case 'cloudimage':
//                return new CloudImageCdnProvider();
        }

        throw new InvalidArgumentException("Unsupported provider [{$providerName}].");
    }
}
