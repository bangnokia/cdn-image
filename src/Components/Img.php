<?php

namespace Bangnokia\CdnImage\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Img extends Component
{
    public string $src;

    public ?string $width;

    public ?string $height;

    protected string $cdnUrl;

    public function __construct(string $src, string $width = null, string $height = null)
    {
        $this->src = $src;
        $this->width = $width;
        $this->height = $height;
    }

    protected function makeCdnUrl()
    {
        ['host' => $host, 'path' => $path] = parse_url($this->src);

        $this->cdnUrl = "https://cdn.statically.io/img/{$host}";
        $filters = $this->makeFilter();

        if ($filters->isNotEmpty()) {
            $this->cdnUrl .= '/'.collect($filters)->map(fn ($value, $key) => $key.'='.$value)->join(',');
        }

        $this->cdnUrl .= Str::start($path, '/');

        return $this;
    }

    protected function makeFilter()
    {
        $filters = [];

        if ($this->width) {
            $filters['w'] = $this->width;
        }

        if ($this->height) {
            $filters['h'] = $this->height;
        }

        return collect($filters)->filter();
    }

    public function render()
    {
        $this->makeCdnUrl();

        return view('cdn-image::img', [
            'cdnUrl' => $this->cdnUrl,
        ]);
    }
}
