# Laravel CDM image blade component

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/run-tests?label=tests)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/Check%20&%20fix%20styling?label=code%20style)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)


If your website is running and has lots of images which make it slow, you should start to use a CDN for better speed beside with some convenient operations to manipulate image like resize, filter, convert to webp, etc...


By default, this package supports [statically](https://statically.io/) (a free CDN service out of the box) using via `/img` endpoint.


## Installation

You can install the package via composer:

```bash
composer require bangnokia/cdn-image
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="BangNokia\CdnImage\CdnImageServiceProvider" --tag="cdn-image-config"
```

Sample config file

```php
<?php

return [
    'default' => 'statically',

    'services' => [
        'statically' => [
            'domain' => 'cdn.statically.io'
        ],

        'cloud_image' => [
            'domain'  => 'cloudimg.io',
            'token'   => env('CLOUD_IMAGE_TOKEN'),
            'version' => env('CLOUD_IMAGE_VERSION', 'v7')
        ]
    ]
];
```

Now you should value for the provider you are using in `config/cdn_image.php` config file.

### CDN Providers supported

- [Statically](https://statically.io/)
- [Cloudimage](https://www.cloudimage.io/en/home)

## Usage

The blade `x-img` component supports 3 most used props (at least I thought that):

- `src`
- `width`
- `height`

and 
- `query` for other operations which depends on each provider
 
Example
```html
<x-img src="http://foo.bar/demo.jpg" width="200" height="100" :query="['q' => 90']" />
```
will be rendered to
```html
<img src="htts://statically.io/img/foo.bar/w=200,h=100,q=90/demo.jpg" >
```
## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [bangnokia](https://github.com/bangnokia)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
