# PHP-CS-Fixer Config

This package contains the `PHP-CS-Fixer` configuration that I use on all projects. It is best used with a Laravel application (but can be used very easily w/ any PHP project -- copy the `.php_cs` in the root directory to your project after installing via Composer).

I have spent a lot of time building of this configuration file over the years. Feel free to open up a PR if you think a new rule should be added to the configuration.

## Install the package

```bash
composer require erikgall/php-cs-fixer-config
```

## Commands / Usage

### Running Install Command (Laravel)

```bash
php artisan fixer:install
```

### Running Fix Command (Laravel)

```bash
php artisan fix
```
