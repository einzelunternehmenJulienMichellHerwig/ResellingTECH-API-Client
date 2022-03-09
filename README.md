Reselling.tech PHP API Client
=======================
This **PHP 7.2+** library allows you to communicate with the Reselling.tech API.

## Getting Started

Recommended installation is using **Composer**!

In the root of your project execute the following:
```sh
$ composer require serverblaze/reselling-tech-php
```

Or add this to your `composer.json` file:
```json
{
    "require": {
        "serverblaze/reselling-tech-php": "^1.0"
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
