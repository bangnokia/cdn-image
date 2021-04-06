<?php

namespace BangNokia\CdnImage\Tests;

class ImgComponentWhenStaticallyProviderTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        config(['cdn_image.default' => 'statically']);
    }

    public function test_it_can_render_img_using_statically_provider()
    {
        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" />');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg" >', false);
    }

    public function test_it_can_accept_width_and_height()
    {
        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" width="200" height="100" />');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/w=200,h=100/lmao.jpg" >', false);

        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" width="100" />');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/w=100/lmao.jpg" >', false);
    }
}
