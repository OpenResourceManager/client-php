# ORM Client - PHP

[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/OpenResourceManager/client-php/master/LICENSE)
[![GitHub issues](https://img.shields.io/github/issues/OpenResourceManager/client-php.svg)](https://github.com/OpenResourceManager/client-php/issues)

## Install

Install with [composer](https://packagist.org/packages/open-resource-manager/client-php).

```shell
composer require open-resource-manager/client-php ^1.0
```

## Usage

#### Docs:

The API documentation is available [here](https://openresourcemanager.github.io/client-php/docs/).

#### Example:

```php
<?php

use Exception;
use OpenResourceManager\ORM;
use OpenResourceManager\Client\Account as AccountClient;

class SomeClass
{
    function someFunction () {
    
        // API environment variables
        $apiSecret = '123456789';
        $apiHost = 'localhost';
        $apiPort = 80;
        $apiVersion = 1;
        $useHttps = false;
        
        // Build the ORM connection
        $orm = new ORM($apiSecret, $apiHost, $apiVersion, $apiPort, $useHttps);
        
        // Build an account client
        $accountClient = new AccountClient($orm);
        
        // Get an ORM Account
        $response = $accountClient->getFromUsername('skywal');
        
        // Verify that the API returned a 200 http code
        if ($response->code == 200) {
            // Get the account from the response body
            $account = $response->body->data;
        } else {
            // Throw an exception if we did not get 200 back
            // display the http code with the message from the API.
            throw new Exception($response->body->message, $response->code);
        }
    }
}
```