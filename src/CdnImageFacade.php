<?php

namespace Bangnokia\CdnImage;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Bangnokia\CdnImage\CdnImage
 */
class CdnImageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cdn_image';
    }
}
