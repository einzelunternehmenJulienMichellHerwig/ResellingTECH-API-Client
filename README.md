Reselling.tech PHP API Client
=======================

[![PHP Composer](https://github.com/integromediaug/ResellingTECH-API-Client/actions/workflows/php.yml/badge.svg?branch=main)](https://github.com/ServerBlazeDE/ResellingTECH-API-Client/actions/workflows/php.yml)
[![Latest Version](https://img.shields.io/packagist/v/integromediaug/resellingtech-api-client?label=version)](https://packagist.org/packages/integromediaug/resellingtech-api-client/)
[![Composer Downloads](https://img.shields.io/packagist/dm/integromediaug/resellingtech-api-client.svg?label=Composer%20Downloads)](https://packagist.org/packages/integromediaug/resellingtech-api-client)


This **PHP 7.0+** library allows you to communicate with the Reselling.tech API.

## Getting Started

Recommended installation is using **Composer**!

In the root of your project execute the following:
```sh
$ composer require integromediaug/resellingtech-api-client
```
 
Or add this to your `composer.json` file:
```json 
{
    "require": {
        "integromediaug/resellingtech-api-client": "^1.0"
    }
}
```

Then perform the installation:
```sh
$ composer install --no-dev
```

### Examples

Get Price from .DE TLD
```php
<?php
// Require the autoloader
require_once 'vendor/autoload.php';

// Use the library namespace
use ResellingTech\ResellingTech;

// Then simply pass your API-Token when creating the API client object.
$client = new ResellingTech('API-Token');

// Then you are able to perform a request
var_dump($client->domain()->getPrice('de'));
?>
```


### Disclaimer

Der API Client wurde auf base von [Bastian Leicht´s](https://github.com/bastianleicht) API Clients gebaut.

Der Client darf nicht ohne Erlaubnis für eigene Zwecke umgeschrieben und / oder veröffentlicht werden.

Die Rechte am Client liegen bei [Bastian Leicht](https://github.com/bastianleicht) & [Julien Michell Herwig](https://github.com/CookieMC337)
