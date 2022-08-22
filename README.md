
# traaittPlatform RPC PHP

traaittPlatform RPC PHP is a PHP wrapper for the traaittPlatform JSON-RPC interfaces.

Requires traaittPlatform v0.8.4+

---

1) [Install traaittPlatform RPC PHP](#install-traaittplatform-rpc-php)
1) [Examples](#examples)
1) [Docs](#docs)
1) [License](#license)

---

## Install traaittPlatform RPC PHP

This package requires PHP >=7.1.3. Require this package with composer:

```
composer require traaittplatform/traaittplatform-rpc-php
```

## Examples

```php
use traaittPlatform\ETRXnetwork;

$config = [
    'rpcHost' => 'http://127.0.0.1',
    'rpcPort' => 24496,
];

$ETRXnetwork = new ETRXnetwork($config);
echo $ETRXnetwork->getBlockCount();

> {"id":2,"jsonrpc":"2.0","result":{"count":784547,"status":"OK"}}
``` 

```php
use traaittPlatform\ETRXservice;

$config = [
    'rpcHost'     => 'http://127.0.0.1',
    'rpcPort'     => 8447,
    'rpcPassword' => 'test',
];

$ETRXservice = new ETRXservice($config);
echo $ETRXservice->getBalance($walletAddress);

> {"id":0,"jsonrpc":"2.0","result":["availableBalance":100,"lockedAmount":50]}
``` 

Optionally, you may access details about the response:

```php
$response = $ETRXservice->getBalance($walletAddress);

// The result field from the RPC response
$response->result();

// RPC response as JSON string
$response->toJson();

// RPC response as an array
$response->toArray();

// Or other response details
$response->getStatusCode();
$response->getProtocolVersion();
$response->getHeaders();
$response->hasHeader($header);
$response->getHeader($header);
$response->getHeaderLine($header);
$response->getBody();
``` 

## Docs

Documentation of the traaittPlatform RPC API and more PHP examples for this package can be found at [api-docs.traaittplatform.lol](https://api-docs.traaittplatform.lol).

## License

traaittPlatform RPC PHP is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
