# using cdn for images on the website

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/run-tests?label=tests)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/bangnokia/cdn-image/Check%20&%20fix%20styling?label=code%20style)](https://github.com/bangnokia/cdn-image/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/bangnokia/cdn-image.svg?style=flat-square)](https://packagist.org/packages/bangnokia/cdn-image)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require bangnokia/cdn-image
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Bangnokia\CdnImage\CdnImageServiceProvider" --tag="cdn_image-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Bangnokia\CdnImage\CdnImageServiceProvider" --tag="cdn_image-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$cdn_image = new Bangnokia\CdnImage();
echo $cdn_image->echoPhrase('Hello, Spatie!');
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
