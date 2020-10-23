# g-suite-php-sdk
GSuite php sdk

## Description

This is Vendasta's official PHP SDK for API integration of g-suite.

## Requirements

- PHP 5.5 and above or PHP 7.0 and above
- [PECL](https://pecl.php.net/) (may be used to install the required PHP extensions)
- [Composer](https://getcomposer.org/)
- [PHP gmp extension](http://php.net/manual/en/book.gmp.php)
- OPTIONAL (but recommended): [PHP grpc extension](https://cloud.google.com/php/grpc)

## Installation

Install the requirements from above, then:

```bash
composer require vendasta/gsuite
```

## Authentication

To authenticate your SDK calls, you must provision a service account from within the Vendasta platform.

You must put this file on your server, and set an environment variable to it's path:

```bash
export VENDASTA_APPLICATION_CREDENTIALS=<path to credentials.json>
```

## Client Initialization

It is highly recommended that you use a singleton client instance. Each client initilization will open it's own connection, therefore using a singleton results in reusing a connection, saving time and resources.

Set an environment variable:

```bash
export ENVIRONMENT=<DEMO or PROD> 
```

To instantiate the client:

```php
$environment = getenv("ENVIRONMENT");
if ($environment == null) {
    $environment = "DEMO";
}

$client = new Vendasta\GSuite\V1\PartnerClient($environment);
```

Notice that the environment will be set to DEMO if it is not specified.

## Getting domain information
```php
$req = new GSuite\V1\GetDomainInformationRequest();
$req->setDomain("<domain>");
$resp = $client->GetDomainInformation($req);
```

## Reducing seats

If needed, a list of subscriptions and their SKU IDs can be found [here](https://developers.google.com/admin-sdk/licensing/v1/how-tos/products). 

```php
$req = new ListSubscriptionsRequest();
$req->setDomain("<domain>");

$resp = $client->ListSubscriptions($req);

$subscriptions = $resp->getSubscriptions();
$subscriptionID = $subscriptions[0]->getSubscriptionId();

$req = new ChangeSeatsRequest();
$req->setCustomerId("<domain>");
$req->setSubscriptionId($subscriptionID);
$req->setSeats(1);

$resp = $client->ChangeSeats($req);
```

## Disabling SSO

```php
$req = new UpdateSSORequest();
$req->setDomain("<domain>");
// disable SSO
$req->setEnableSso(false);

$resp = $client->UpdateSSO($req);
```