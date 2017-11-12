[![Build Status](https://travis-ci.org/takeawaytown/laravel-settings.svg?branch=master)](https://travis-ci.org/takeawaytown/laravel-settings)
[![Latest Stable Version](https://poser.pugx.org/takeawaytown/laravel-settings/v/stable.svg)](https://packagist.org/packages/takeawaytown/laravel-settings)
[![Total Downloads](https://poser.pugx.org/takeawaytown/laravel-settings/downloads.svg)](https://packagist.org/packages/takeawaytown/laravel-settings)
[![License](https://poser.pugx.org/takeawaytown/laravel-settings/license.svg)](https://packagist.org/packages/takeawaytown/laravel-settings)

# Laravel-Settings

Laravel 5.x.x persistent settings using Database and/or JSON

# Install process

1. Require this package with composer :

    `composer require takeawaytown/laravel-settings`

2. Register the ServiceProvider to the `providers` array in `config/app.php`

    `TakeawayTown\LaravelSettings\SettingsServiceProvider::class,`

3. Add an alias for the facade to `aliases` array in  your `config/app.php`

    `'Settings'  => TakeawayTown\LaravelSettings\Facades\Settings::class,`

4. Publish the config and migration files:

    `php artisan vendor:publish --provider="TakeawayTown\LaravelSettings\SettingsServiceProvider" --force`

Change `config/settings.php` according to your needs.

Create the `settings` table.

    php artisan migrate

# Credits to main author

Anlutro Laravel Settings: [anlutro/laravel-settings](https://github.com/anlutro/laravel-settings)
