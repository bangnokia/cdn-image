<?php

namespace BangNokia\CdnImage\Components;

use BangNokia\CdnImage\CdnProviderFactory;
use Illuminate\View\Component;
use BangNokia\CdnImage\Contracts\CdnProvider;

class Img extends Component
{
    public string $src;

    public ?string $width;

    public ?string $height;

    public array $query = [];

    protected CdnProvider $provider;

    public function __construct(string $src, string $width = null, string $height = null)
    {
        $this->src = $src;
        $this->width = $width;
        $this->height = $height;
    }

    protected function makeCdnUrl()
    {
        $cdnProvider = CdnProviderFactory::makeProvider(config('cdn_image.default'));

        return $cdnProvider->makeUrl($this->src, $this->width, $this->height, $this->query);
    }

    /**
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        $this->makeCdnUrl();

        return view('cdn-image::img', [
            'cdnUrl' => $this->makeCdnUrl()
        ]);
    }
}
