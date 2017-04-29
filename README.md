# ORM Client for PHP

ORM client library for php.

---

## Install

Install with composer

```shell
composer require open-resource-manager/client-php
```

## Usage

#### Docs:

The API documentation is available [here](https://openresourcemanager.github.io/client-php/docs/).

#### Example:

```php
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
            thow new Exception($response->body->message, $response->code);
        }
    }
}
```