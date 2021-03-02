# g-suite-php-sdk
Google Workspace PHP SDK

## Description

This is Vendasta's official PHP SDK for API integration of Google Workspace.

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

To authenticate your SDK calls, you must provision a service account from within the Vendasta platform. Refer to the [service account guide](https://developers.vendasta.com/guides/service-accounts) in order to setup authentication.

You must put this file on your server, and set an environment variable to its path:

```bash
export VENDASTA_APPLICATION_CREDENTIALS=<path to credentials.json>
```

## Client Initialization

It is highly recommended that you use a singleton client instance. Each client initialization will open its own connection, therefore using a singleton results in reusing a connection, saving time and resources.

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

$client = new Vendasta\GSuite\V1\PartnerServiceClient($environment);
```

Notice that the environment will be set to DEMO if it is not specified.

## How to use this SDKS

### Getting domain information
To get the information for a domain including the TXT record and status:
```php
$req = new GSuite\V1\GetDomainInformationRequest();
$req->setDomain("<domain>");
$resp = $client->GetDomainInformation($req);
```

### Reducing seats

To reduce seats on a subscription list subscriptions on a domain and then calling the ChangeSeats endpoint with a subscription ID. This [page](https://developers.google.com/admin-sdk/licensing/v1/how-tos/products) can be referenced to determine which SKU ID you would like to change seats for if there is more than one subscription on the domain.
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

### Disabling SSO
SSO is turned on by default. To toggle it off:
```php
$req = new UpdateSSORequest();
$req->setDomain("<domain>");
// disable SSO
$req->setEnableSso(false);

$resp = $client->UpdateSSO($req);
```