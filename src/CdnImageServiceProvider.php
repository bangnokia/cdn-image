<?php

namespace Bangnokia\CdnImage;

use Bangnokia\CdnImage\Commands\CdnImageCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CdnImageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('cdn_image')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_cdn_image_table')
            ->hasCommand(CdnImageCommand::class);
    }
}
