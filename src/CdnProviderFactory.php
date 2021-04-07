<?php

namespace BangNokia\CdnImage;

use BangNokia\CdnImage\CdnProviders\CloudImageCdnProvider;
use BangNokia\CdnImage\CdnProviders\StaticallyCdnProvider;
use BangNokia\CdnImage\Contracts\CdnProvider;
use InvalidArgumentException;

class CdnProviderFactory
{
    public static function makeProvider(string $providerName): CdnProvider
    {
        switch ($providerName) {
            case 'statically':
                return new StaticallyCdnProvider(config('cdn_image.services.statically.domain'));
            case 'cloud_image':
                ['domain' => $domain, 'token' => $token, 'version' => $version] = config('cdn_image.services.cloud_image');

                return new CloudImageCdnProvider($domain, $token, $version);
        }

        throw new InvalidArgumentException("Unsupported provider [{$providerName}].");
    }
}
