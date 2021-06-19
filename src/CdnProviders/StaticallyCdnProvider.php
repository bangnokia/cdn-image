<?php


namespace BangNokia\CdnImage\CdnProviders;

use BangNokia\CdnImage\Contracts\CdnProvider;
use Illuminate\Support\Str;

class StaticallyCdnProvider implements CdnProvider
{
    protected string $domain;

    public function __construct(string $domain)
    {
        $this->domain = $domain;
    }

    public function makeUrl(string $originalUrl, ?string $width, ?string $height, array $options = []): string
    {
        $parts = parse_url($originalIUrl);

        $path = $parts['path'];
        $host = $parts['host'] ?? null;

        if (! $host) {
            return $originalUrl;
        }

        $cdnUrl = "https://{$this->domain}/img/{$host}";

        $operations = collect(array_merge($options, [
            'w' => $width,
            'h' => $height,
        ]))->filter();

        return $cdnUrl.Str::start($path, '/')
            .($operations->isNotEmpty() ? '?'.http_build_query($operations->toArray()) : null);
    }
}
