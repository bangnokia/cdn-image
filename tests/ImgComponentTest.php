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
        if (version_compare($this->app->version(), '8.0', '<')) {
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

    public function test_it_can_use_raw_url_in_local_environment()
    {
        config(['cdn_image.force_cdn' => false]);
        $this->app->detectEnvironment(fn () => 'local');

        $view = $this->blade('<x-img src="http://localhost/test.jpg" />');
        $view->assertSee('<img src="http://localhost/test.jpg" >', false);

        $view = $this->blade('<x-img src="http://github.com/test.jpg" />');
        $view->assertDontSee('src="http://localhost', false);
    }

    public function test_it_can_force_use_cdn_in_local_environment()
    {
        config(['cdn_image.force_cdn' => true]);
        $this->app->detectEnvironment(fn () => 'local');

        $view = $this->blade('<x-img src="http://localhost/test.jpg" />');
        $view->assertDontSee('<img src="http://localhost/test.jpg" >', false);
    }
}
