# Vendasta Google Workspace PHP SDK

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

## Provisioning a Google Workspace account
Provisioning a new Google Workspace account can be done using the [Account Group SDK](https://packagist.org/packages/vendasta/accountgroup) and [Sales Orders SDK](https://packagist.org/packages/vendasta/sales-orders). The Account Group SDK is used to create business accounts in Partner Center. Follow the readme for installation and setup.
Create is synchronous. It immediately creates the account and returns the account group ID for the business you made (used as the business ID in the other SDKs).
After a business is created you can use the Sales Orders SDK to purchase products on that business using the business ID from the Account Group SDK.
CreateAndActivateOrder is an asynchronous process which can result in approval or rejection from the vendor. The status of the order can be polled using the GetSalesOrder endpoint given the order ID from CreateAndActivateOrder.

### Production App and Add-on IDs
* Google Workspace Business Starter - MP-XBHPSLDBHZ8Q8F57P43DPKL6SPHKHHMS
    * Google Workspace Seat - A-PSZPWNCFWM
* Google Workspace Business Standard - MP-BJ37LGNT37SDN6LR7D46MPP7CBG82MN6
    * Google Workspace Seat - A-DH5P2QL4MG
* Google Workspace Business Plus - MP-S2RJ778BSJR7KXFSS775BHCX383CJVSV
    * Google Workspace Seat - A-3MC43W3SXM
* Google Workspace Enterprise - MP-FCZGBZM4ZNSGV26CCKVB6GM4F8T5Q6HG
    * Google Workspace Seat - A-QH5H53VTKQ
* Google Workspace Transfer - MP-LMVNT4HKZCXTVDFMVT62Q6VB3ZJGNQC6

### Demo environment App and Add-on IDs
* Google Workspace Business Starter - MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q
    * Google Workspace Seat - A-JMJX3KJPT5
* Google Workspace Business Standard - MP-GNWSMJS4BJB4Z8RZWZ8SXW6J4HP32KJ3
    * Google Workspace Seat - A-JZTKNPKBDL
* Google Workspace Business Plus - MP-8PS55DCP5DKMDPDHHPWSFPD8XCM44324
    * Google Workspace Seat - A-XMF5CQJPJQ
* Google Workspace Enterprise - MP-VDNQPHCTCMHVMSNW87R8N3NRTS4HC6LV
    * Google Workspace Seat - A-T5LTKP7ZTV
* Google Workspace Transfer - MP-7TMH5K8N7KNNRZ5NC4RNNS2JFK64HMNC


```php
// Choose environment and partnerId
$env = "DEMO";
$pid = "<PID>";

// Instantiate clients
$accountGroupClient = new AccountGroupServiceClient($env);
$gSuiteClient = new GSuitePartnerClient($env);
$salesOrdersClient = new SalesOrdersClient($env);

// Build request to create a business
$createReq = new CreateAccountGroupRequest();
$location = new AccountGroupLocation();
$location->setCompanyName("Test Company");
$location->setAddress("123 Street Name");
$location->setCity("Chicago");
$location->setState("IL");
$location->setCountry("US");
$location->setZip("88888");
$workNumber = array("(999) 999-9999");
$location->setWorkNumber($workNumber);
$createReq->setAccountGroupNap($location);
$createReq->setPartnerId($pid);

// Make call and store returned accountGroupId
$resp = $accountGroupClient->Create($createReq);
$accountGroupId = $resp->getAccountGroupId();

// Build sales order request & activate the products
// Create the request
$req = new CreateAndActivateOrderRequest();

// Create the line items
$gSuite = SalesOrdersUtils::buildLineItem('MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q');
$lineItems = array($gSuite);

// Create the custom field
$gSuiteCustomField = SalesOrdersUtils::buildGSuiteCustomField("MP-6XDHVMQ84K4THNNP2Z7W2GC28VLHRC4Q", 'testdomain123.com', 'adminusername', 'First', 'Last', 'example@email.com');
$customFields = array($gSuiteCustomField);

// Create the order
$order = SalesOrdersUtils::buildOrder($pid, $accountGroupId, $lineItems, $customFields);
$req->setOrder($order);

// Call CreateAndActivateOrder
$resp = $salesOrdersClient->CreateAndActivateOrder($req);

// Poll the pending activation process using GetSalesOrder

// Build request to get Google Workspace domain information
$req = new GetDomainInformationRequest();
$req->setDomain("<DOMAIN>");

// Make request and store the DNS TXT record
$resp = $gSuiteClient->GetDomainInformation($req);
$txtRecord=  $resp->getDomainInformation()->getDnsTxtRecord();
```

## Deprovision an account

```php
// Choose environment and partnerId
$env = "DEMO";
$pid = "";

// Select the app ID and business ID to deactivate
$businessId = "";
$appId = "";

// The activation ID will be populated after we list all the products on the business
$activationId = "";


$client = new AccountsServiceClient($env);

// First list all of the current products activated for that business and find the one matching the appID
$listReq = new ListRequest();
$listReq->setPartnerId($pid);
$listReq->setBusinessId($businessId);
$resp = $client->List($listReq);
foreach($resp->getAccounts() as $account) {
    if ($account->getAppId() == $appId) {
        // The activation ID is necessary for deactivating an app
        $activationId = $account->getActivationId();
    }
}

// Build the deactivation request with the activation ID
$deactivationReq = new DeactivateAppRequest();
$deactivationReq->setBusinessId($businessId);
$deactivationReq->setAppId($appId);
$deactivationReq->setActivationId($activationId);
$deactivationReq->setDeactivationType(DeactivationType::DEACTIVATION_TYPE_CANCEL);
```

## How to use this SDK

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