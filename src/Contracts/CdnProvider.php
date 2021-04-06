<?php

namespace BangNokia\CdnImage\Contracts;

interface CdnProvider
{
    public function makeUrl(string $originalUrl, ?string $width, ?string $height, array $options = []): string;
}
