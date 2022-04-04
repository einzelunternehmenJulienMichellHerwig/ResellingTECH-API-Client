## Navigation
* [getPricelist](#getpricelist)
* [getPrice](#getprice)
* [check](#check)
* [getDomain](#getdomain)
* [getAuthcode](#getauthcode)
* [register](#register)
* [transfer](#transfer)
* [update](#update)
* [restore](#restore)
* [delete](#delete)
* [undelete](#undelete)

Initiate the client:
```php
<?php
// Require the autoloader
require_once 'vendor/autoload.php';
// Use the library namespace
use ResellerServices\ResellerServices;
// Then simply pass your API-Token when creating the API client object.
$client = new ResellerServices('API-Token');
```

### getPricelist
```php
$response = $client->domain()->getPricelist();
print_r($response);
```
returns:
```json
{
  "metadata": {
    "clientRequestId": "00000",
    "serverRequestId": "00000",
    "serverRequestTime": {
      "date": "2022-03-24 14:32:48.945841",
      "timezone_type": 3,
      "timezone": "Europe/Berlin"
    }
  },
  "data": {
    "0": {
      "tld": "ac",
      "price": "00.00",
      "renew_price": "00.00",
      "transfer_price": "00.00"
    }
  }
}
```

### getPrice
```php
$tld = 'de';
$response = $client->domain()->getPrice($tld);
print_r($response);
```
returns:
```json
{
  "metadata": {
    "clientRequestId": "00000",
    "serverRequestId": "00000",
    "serverRequestTime": {
      "date": "2022-03-24 14:32:48.945841",
      "timezone_type": 3,
      "timezone": "Europe/Berlin"
    }
  },
  "data": {
      "tld": "de",
      "price": "00.00",
      "renew_price": "00.00",
      "transfer_price": "00.00"
  }
}
```

### check
```php
$domainName = 'domain.de';
$response = $client->domain()->check($domainName);
print_r($response);
```
returns:
```json
{
  "metadata": {
    "clientRequestId": "00000",
    "serverRequestId": "00000",
    "serverRequestTime": {
      "date": "2022-03-24 14:34:31.924870",
      "timezone_type": 3,
      "timezone": "Europe/Berlin"
    }
  },
  "data": {
    "available": true,
    "domainname": "domain.de"
  },
  "state": "success",
  "message": {
    "warning": {},
    "error": {},
    "success": {
      "0": "Daten wurden Abgefragt"
    }
  }
}
```

### getDomain
```php
$domainName = 'domain.de';
$client->domain()->getDomainData($domainName);
```
returns:
```json
{
  "TODO": true
}
```

### getAuthcode
```php
$domainName = 'reseller-services.de';   // You can use every domain,
                                        // but it must include the tld!
$client->domain()->getAuthcode($domainName);
```
returns:
```json
{
  "TODO": true
}
```

### register
```php
$domainName = 'reseller-services.de';
$ownerContact = 'HANDLE';
$adminContact = 'HANDLE';
$technicianContact = 'HANDLE';
$zoneContact = 'HANDLE';
$ns1 = 'ns1.reselling.network';
$ns2 = 'ns2.reselling.network';
$ns3 = 'ns3.reselling.network';
$ns4 = 'ns4.reselling.network';
$ns5 = 'ns5.reselling.network';
$years = 1;
$client->domain()->register($domainName, $ownerContact, $adminContact, $technicianContact, $zoneContact, $ns1, $ns2, $ns3, $ns4, $ns5, $years);
```
returns:
```json
{
  "TODO": true
}
```

### transfer
```php
$domainName = 'reseller-services.de';
$ownerContact = 'HANDLE';
$adminContact = 'HANDLE';
$technicianContact = 'HANDLE';
$zoneContact = 'HANDLE';
$ns1 = 'ns1.reselling.network';
$ns2 = 'ns2.reselling.network';
$ns3 = 'ns3.reselling.network';
$ns4 = 'ns4.reselling.network';
$ns5 = 'ns5.reselling.network';
$years = 1;
$authCode = 'AA1BB2CC3DD4EE5';
$client->domain()->transfer($domainName, $ownerContact, $adminContact, $technicianContact, $zoneContact, $ns1, $ns2, $ns3, $ns4, $ns5, $years, $authCode);
```
returns:
```json
{
  "TODO": true
}
```

### update
```php
$domainName = 'reseller-services.de';
$ownerContact = 'HANDLE';
$adminContact = 'HANDLE';
$technicianContact = 'HANDLE';
$zoneContact = 'HANDLE';
$ns1 = 'ns1.reselling.network';
$ns2 = 'ns2.reselling.network';
$ns3 = 'ns3.reselling.network';
$ns4 = 'ns4.reselling.network';
$ns5 = 'ns5.reselling.network';
$client->domain()->update($domainName, $ownerContact, $adminContact, $technicianContact, $zoneContact, $ns1, $ns2, $ns3, $ns4, $ns5);
```
returns:
```json
{
  "TODO": true
}
```

### restore
```php
$domainName = 'reseller-services.de';
$client->domain()->restore($domainName);
```
returns:
```json
{
  "TODO": true
}
```

### delete
```php
$domainName = 'reseller-services.de';
$date = '2021-11-01';   //  yyyy-mm-dd
$client->domain()->delete($domainName, $date);
```
returns:
```json
{
  "TODO": true
}
```

### undelete
```php
$domainName = 'reseller-services.de';
$client->domain()->undelete($domainName);
```
returns:
```json
{
  "TODO": true
}
```