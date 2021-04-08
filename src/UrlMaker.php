<?php

namespace BangNokia\CdnImage;

use Illuminate\Support\Str;

class UrlMaker
{
    /**
     * We won't check some case like /foo.jpg
     * Ensure you pass full url of the image file http://localhost/foo.jpg
     *
     * @param  string  $src
     * @param  string|null  $width
     * @param  string|null  $height
     * @param  array  $options
     * @return string
     */
    public static function make(string $src, ?string $width, ?string $height, array $options = []): string
    {
        if (! config('cdn_image.force_cdn') && app()->isLocal() && Str::of($src)->startsWith(config('app.url'))) {
            return $src;
        }

        return CdnProviderFactory::makeProvider(config('cdn_image.default'))->makeUrl(...func_get_args());
    }
}
