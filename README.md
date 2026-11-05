# Laravel Form Builder

A low-code Journey/Form Builder package for Laravel that enables administrators to create dynamic multi-screen forms without writing code.

## Features

- Screen Builder
- Section Builder
- Field Builder
- Drag & Drop Ordering
- JSON Preview
- Journey Publish
- Validation Support
- AJAX CRUD Operations

## Installation

```bash

composer require prasanth/form-builder:dev-main --prefer-source

```
## Publish Config

```bash
php artisan vendor:publish --tag=formbuilder-config
```

## Publish Assets

```bash
php artisan vendor:publish --tag=formbuilder-assets
```



## Run Migrations

```bash
php artisan migrate
```

## Access Builder

```text
/admin/forms
```

## Updating Package

After pushing changes to GitHub and updating Packagist:

```bash
composer clear-cache

composer update prasanth/form-builder
```

Check installed version:

```bash
composer show prasanth/form-builder


## Uninstall Package

The package includes an uninstall command to remove Form Builder database tables.

### Interactive

```bash
php artisan formbuilder:uninstall
```

### Force Mode

```bash
php artisan formbuilder:uninstall --force
```

Remove package:

```bash
composer remove prasanth/form-builder

## Requirements

- PHP 8.1+
- Laravel 10+