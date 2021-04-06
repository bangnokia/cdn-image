<?php

namespace Bangnokia\CdnImage\Components;

use Illuminate\View\Component;

class Img extends Component
{
    public string $src;

    public string $cdnUrl;

    public function __construct(string $src)
    {
        $this->src = $src;
    }

    protected function makeCdnUrl()
    {
        ['host' => $host, 'path' => $path] = parse_url($this->src);

        $this->cdnUrl = "https://cdn.statically.io/img/{$host}{$path}";

        return $this;
    }

    public function render()
    {
        $this->makeCdnUrl();

        return view('cdn-image::img');
    }
}
