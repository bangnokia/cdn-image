<?php

namespace BangNokia\CdnImage\Tests;

use Illuminate\View\ViewException;

class ImgComponentTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        config(['cdn_image.default' => 'statically']);
    }

    public function test_src_prop_is_required()
    {
        if (version_compare($this->app->version(), '8.0', '>')) {
            $this->markTestSkipped('Skip for Laravel 7');
        }

        $this->expectException(ViewException::class);

        $this->blade('<x-img src="" alt="aaaaaa" />');
    }

    public function test_it_can_accept_attributes()
    {
        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" name="foo" alt="bar"/>');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg" name="foo" alt="bar">', false);
    }
}
