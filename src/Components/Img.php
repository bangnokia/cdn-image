<?php

namespace BangNokia\CdnImage\Components;

use BangNokia\CdnImage\Contracts\CdnProvider;
use BangNokia\CdnImage\UrlMaker;
use Illuminate\View\Component;

class Img extends Component
{
    public string $src;

    public ?string $width;

    public ?string $height;

    public array $query = [];

    protected CdnProvider $provider;

    public function __construct(string $src, string $width = null, string $height = null, array $query = [])
    {
        $this->src = $src;
        $this->width = $width;
        $this->height = $height;
        $this->query = $query;
    }

    protected function makeCdnUrl(): string
    {
        return UrlMaker::make($this->src, $this->width, $this->height, $this->query);
    }

    /**
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        $this->makeCdnUrl();

        return view('cdn-image::img', [
            'cdnUrl' => $this->makeCdnUrl(),
        ]);
    }
}
