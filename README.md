p4n-html
=======================
[![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://GitHub.com/hoalzein/p4n-html.js/graphs/commit-activity)

A laravel wrapper for Prof4Net html elements.


### 1. Installation for Laravel 6+
Run this at the command line:

```bash
composer require hoalzein/p4n-html
```

This will update `composer.json` and install the package into the `vendor/` directory.

### 2. Usage
To use the html elements simply follow the provided examples:

```php
<?php

// P4NHTML class
$p4nhtml = new hoalzein\Prof4Net\Html\P4NHtml;

// Button
$button = $p4nhtml->Button('Login', 'login.php');
echo $button->html();

// Icon Button
$icon_button = $p4nhtml->IconButton('', 'logout.php', 'power_settings_new');
echo $icon_button->html();

// Card
$cells[0][0] = $p4nhtml->Text('Id');
$cells[0][1] = $p4nhtml->Text('Name');
$card = $p4nhtml->Card('Users', $p4nhtml->Table($cells);
echo $card->html();
```
Using the P4NHTML facade, which is auto-discovered:

```php
<?php

// Breadcrumbs
$home = P4NHTML::Link('Home', 'index.php');
echo P4NHTML::Breadcrumbs([$home, P4NHTML::Link('Users', 'users.php'), P4NHTML::Text('User')])->html();
```

### 3. Generating a configuration file

Confirm that this service provider entry `hoalzein\Prof4Net\Html\P4NHtmlServiceProvider::class` exists in `config/app.php`.

An optional configuration file can be published to customize package settings.

To publish the configuration file, simply run this command:

```bash
php artisan vendor:publish --provider hoalzein\Prof4Net\Html\P4NHtmlServiceProvider --tag p4n-config
```

This will generate the config file at `config/p4n-html.php`. The current possible settings are:

- `'paths' => ['source' => base_path('vendor')]`

### 4. Publishing assets to public directory

Confirm that this service provider entry `hoalzein\Prof4Net\Html\P4NHtmlServiceProvider::class` exists in `config/app.php`.

To publish package assets to your public directory, simply run this command:

```bash
php artisan vendor:publish --provider hoalzein\Prof4Net\Html\P4NHtmlServiceProvider --tag p4n-assets
```

This will copy all the assets to `public/prof4net`. 
