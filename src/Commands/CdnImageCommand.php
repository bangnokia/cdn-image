<?php

namespace Bangnokia\CdnImage\Commands;

use Illuminate\Console\Command;

class CdnImageCommand extends Command
{
    public $signature = 'cdn_image';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
