<?php

namespace BangNokia\CdnImage\CdnProviders;

use BangNokia\CdnImage\Contracts\CdnProvider;
use Illuminate\Support\Str;

class CloudImageCdnProvider implements CdnProvider
{
    protected string $domain;

    protected string $token;

    protected string $version;

    public function __construct(string $domain, string $token, string $version)
    {
        $this->domain = $domain;
        $this->token = $token;
        $this->version = $version;
    }

    public function cloudUrl($originalUrl): string
    {
        return "https://{$this->token}.{$this->domain}/{$this->version}".Str::start($originalUrl, '/');
    }

    public function makeUrl(string $originalUrl, ?string $width, ?string $height, array $options = []): string
    {
        $operations = collect(array_merge($options, [
            'width' => $width,
            'height' => $height,
        ]))->filter();

        return $this->cloudUrl(
            $originalUrl.($operations->isNotEmpty() ? '?'.http_build_query($operations->toArray()) : null)
        );
    }
}
