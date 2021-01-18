# Laravel Marketplace

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marketplaceful/laravel-marketplaceful/run-tests?label=tests)](https://github.com/marketplaceful/laravel-marketplaceful/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require marketplaceful/laravel-marketplaceful
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Marketplaceful\MarketplacefulServiceProvider" --tag="migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Marketplaceful\MarketplacefulServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage

```php
$laravel-marketplaceful = new Marketplaceful\Marketplaceful();
echo $laravel-marketplaceful->echoPhrase('Hello, Marketplaceful!');
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

- [Oliver Jimenez-Servin](https://github.com/oliverds)
- [All Contributors](../../contributors)

## License

The AGPL License (AGPL-3.0). Please see [License File](LICENSE.md) for more information.
