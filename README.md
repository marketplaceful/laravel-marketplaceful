# Marketplaceful - Self-host your marketplace software

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marketplaceful/laravel-marketplaceful/run-tests?label=tests)](https://github.com/marketplaceful/laravel-marketplaceful/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/marketplaceful/laravel-marketplaceful.svg?style=flat-square)](https://packagist.org/packages/marketplaceful/laravel-marketplaceful)

A web platform for quickly building online marketplaces built on Laravel.

## Installation

1. Add the `marketplaceful:install` command to `post-autoload-dump` in `composer.json` .

``` json
"post-autoload-dump": [
    "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
    "@php artisan package:discover --ansi",
    "@php artisan marketplaceful:install --ansi"
],
```

2. Require `marketplaceful/laravel-marketplaceful`.

``` bash
composer require marketplaceful/laravel-marketplaceful
```

3. Add the `InteractsAsMarketplaceUser` trait to your existing User model:

``` php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Marketplaceful\Traits\InteractsAsMarketplaceUser;

class User extends Authenticatable {

    use InteractsAsMarketplaceUser;

}
```

4. Run migrations.

``` bash
php artisan migrate
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
