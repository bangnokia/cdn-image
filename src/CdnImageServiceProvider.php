<?php

namespace BangNokia\CdnImage;

use BangNokia\CdnImage\Components\Img;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CdnImageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-cdn-image')
            ->hasConfigFile('cdn_image')
            ->hasViews()
            ->hasViewComponents('', Img::class);
    }
}
