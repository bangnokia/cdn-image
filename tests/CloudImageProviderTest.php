<?php

namespace BangNokia\CdnImage\Tests;

use Illuminate\Support\Str;

class CloudImageProviderTest extends TestCase
{
    use InteractsWithViews;

    public function setUp(): void
    {
        parent::setUp();

        config(['cdn_image.default' => 'cloud_image']);

        config([
            'cdn_image.services.cloud_image' => [
                'domain'  => 'cloudimg.test',
                'token'   => 'test_token',
                'version' => 'v9'
            ]
        ]);
    }

    protected function cloudUrl(string $path = '')
    {
        return 'https://test_token.cloudimg.test/v9'.Str::start($path, '/');
    }

    public function test_it_can_render_img_using_cloud_image_cdn()
    {
        $view = $this->blade('<x-img src="http://github.com/foo.jpg" />');

        $cloudUrl = $this->cloudUrl('http://github.com/foo.jpg');
        $view->assertSee("<img src=\"$cloudUrl\" >", false);
    }

    public function test_it_can_operate_width_and_height()
    {
        $view = $this->blade('<x-img src="http://github.com/foo.jpg" width="200" height="100" />');

        $cloudUrl = $this->cloudUrl('http://github.com/foo.jpg');
        $view->assertSee("<img src=\"$cloudUrl?width=200&amp;height=100\" >", false);
    }

    public function test_it_can_do_some_operations()
    {
        $view = $this->blade(<<<EOF
<x-img src="http://github.com/foo.jpg" :query="['contrast' => 10, 'func' => 'crop']" />
EOF
);

        $cloudUrl = $this->cloudUrl('http://github.com/foo.jpg');
        $view->assertSee("<img src=\"$cloudUrl?contrast=10&amp;func=crop\" >", false);
    }
}
