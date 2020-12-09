# For Laravel framework. Adds helper function to access static data that is kept in data directory.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tsekka/data-loader.svg?style=flat-square)](https://packagist.org/packages/tsekka/data-loader)
[![Build Status](https://img.shields.io/travis/tsekka/data-loader/master.svg?style=flat-square)](https://travis-ci.org/tsekka/data-loader)
[![Quality Score](https://img.shields.io/scrutinizer/g/tsekka/data-loader.svg?style=flat-square)](https://scrutinizer-ci.com/g/tsekka/data-loader)
[![Total Downloads](https://img.shields.io/packagist/dt/tsekka/data-loader.svg?style=flat-square)](https://packagist.org/packages/tsekka/data-loader)

Keep static data in specified folder. Access with global helper function.

## Installation

You can install the package via composer:

```bash
composer require tsekka/data-loader
```

## Usage

Store & access the static data the same way as you store & access laravel config's.

However, the configurations are loaded very early in Laravel application's lifecycle so there is no access to many features(most importantly localization) in config files.

##### Basic example

1. Create file in root/data directory:
``` php
// your-app-root-directory/data/packages.php
return [
   'base' => [
      'title' => __('Base Package'),
      'price' => 25
   ], // ...
];
```

2. Use data() helper to access:
``` php
// DemoController.php
App::setLocale('es');
return data('packages.base.title');
// returns 'Paquete base' (if there is a translation for Base Package)
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

### Security

If you discover any security related issues, please email pintek@pintek.ee instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
