# Laravel image blade component using CDN

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/run-tests?label=tests)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/Check%20&%20fix%20styling?label=code%20style)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)


If your website is running and has lots of images which make it slow, you should swap to using a CDN for better user experience and some convenient operation CDN provider gives us like resize, filter, or event convert to webp, etc.


By default, this package supports [statically](https://statically.io/) (a free CDN service out of the box) using `img` functional.


## Installation

You can install the package via composer:

```bash
composer require bangnokia/cdn-image
```


You can publish the config file with:
```bash
php artisan vendor:publish --provider="Bangnokia\CdnImage\CdnImageServiceProvider" --tag="cdn_image-config"
```

This is the contents of the published config file:

```php
<?php

return [
    // Default CDN provider
    'default' => 'statically',

    'providers' => [
        // Statically is the free cdn, so we dont have to config any api key here
        'statically' => [],
    ]
];
```

## Usage

Component supports 3 most used props (at least I thought that):

- `src`
- `width`
- `height`

Other options you should pass via `query` prop as array
 
```php
<x-img src="http://foo.bar/demo.jpg" width="200" height="100" :query="[]" />
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
