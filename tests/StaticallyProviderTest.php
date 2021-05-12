<?php

namespace BangNokia\CdnImage\Tests;

class StaticallyProviderTest extends TestCase
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

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg?w=200&amp;h=100" >', false);

        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" width="100" />');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg?w=100" >', false);
    }

    public function test_we_dont_have_to_update_code_when_domain_changing()
    {
        config(['cdn_image.services.statically.domain' => 'foo.bar']);

        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" />');

        $view->assertSee('https://foo.bar/img/github.com/lmao.jpg');
    }
}
