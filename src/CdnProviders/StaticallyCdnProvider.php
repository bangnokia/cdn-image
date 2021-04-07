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
        ['host' => $host, 'path' => $path] = parse_url($originalUrl);

        $cdnUrl = "https://{$this->domain}/img/{$host}";

        $operations = collect(array_merge($options, [
            'w' => $width,
            'h' => $height,
        ]))->filter();

        if ($operations->isNotEmpty()) {
            $cdnUrl .= '/'.$operations->map(fn ($value, $key) => $key.'='.$value)->join(',');
        }

        return $cdnUrl.Str::start($path, '/');
    }
}
