# X-Frame-Options for Laravel

[![Build Status](https://travis-ci.org/tecpresso/laravel-x-frame-options.svg?branch=master)](https://travis-ci.org/tecpresso/laravel-x-frame-options)
[![Latest Stable Version](https://poser.pugx.org/tecpresso/laravel-x-frame-options/version)](https://packagist.org/packages/tecpresso/laravel-x-frame-options)
[![Total Downloads](https://poser.pugx.org/tecpresso/laravel-x-frame-options/downloads)](https://packagist.org/packages/tecpresso/laravel-x-frame-options)
[![License](https://poser.pugx.org/tecpresso/laravel-x-frame-options/license)](https://packagist.org/packages/tecpresso/laravel-x-frame-options)

This library gives "X-Frame-Options" to Laravel.

I have created this to avoid OWASP warnings

## Install

```bash
composer require tecpresso/laravel-x-frame-options
```

This library corresponds to auto discovery

If you using laravel 5.4. you have to add the provider in the providers array (config/app.php)

## Configuration

Run command

```bash
php artisan vendor:publish
```

and select the Provider.

Then. generated config file in `confog/x-frame-options` .

You can edit rules for each path.


## Usage

The library enabled automatically.


## Testing

```bash
composer test
```

## Lisence

MIT
