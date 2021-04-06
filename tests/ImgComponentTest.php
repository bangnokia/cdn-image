<?php

namespace Bangnokia\CdnImage\Tests;

use Illuminate\View\ViewException;

class ImgComponentTest extends TestCase
{
    public function test_src_prop_is_required()
    {
        $this->expectException(ViewException::class);

        $this->blade('<x-img src="" alt="aaaaaa" />');
    }

    public function test_it_can_render_img_from_statically()
    {
        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" />');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg" >', false);
    }

    public function test_it_can_accept_attributes()
    {
        $view = $this->blade('<x-img src="http://github.com/lmao.jpg" name="foo" alt="bar"/>');

        $view->assertSee('<img src="https://cdn.statically.io/img/github.com/lmao.jpg" name="foo" alt="bar">', false);
    }
}
