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
echo $button;

// Icon Button
$icon_button = $p4nhtml->IconButton('', 'logout.php', 'power_settings_new');
echo $icon_button;
```

### 3. Generating a configuration file

An optional configuration file can be published to customize package settings.

First initialise the config file by running this command:

```bash
php artisan vendor:publish
```

Then select the index referring to  `p4n-html` to generate the config file at `config/p4n-html.php`
The current possible settings are:

- `'paths' => ['source' => base_path('vendor')]`
