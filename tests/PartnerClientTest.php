<?php

use Gsuite\V1\ChangeSeatsRequest;
use Gsuite\V1\GetDomainInformationRequest;
use Gsuite\V1\ListSubscriptionsRequest;
use Gsuite\V1\UpdateSSORequest;
use PHPUnit\Framework\TestCase;
use Vendasta\GSuite\V1\PartnerServiceClient;

//include_once '../vendor/autoload.php';

class PartnerClientTest extends TestCase
{
    public function testGetDomainInformationHappyPath()
    {
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $partnerClient = new PartnerServiceClient($environment);

        $req = new GetDomainInformationRequest();
        $req->setDomain("google.com");

        try {
            $resp = $partnerClient->GetDomainInformation($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::assertEquals(404, $e->getCode(), 'expected a 404');
            return;
        }

        self::assertNotEmpty(
            $resp->getDomainInformation(),
            'expected domain information to be returned',
        );
    }

    public function testChangeSeatsHappyPath()
    {
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $partnerClient = new PartnerServiceClient($environment);

        $req = new ListSubscriptionsRequest();
        $req->setDomain("domain.com");

        try {
            $resp = $partnerClient->ListSubscriptions($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::fail('error on ListSubscriptions: ' . $e);
        }

        $subscriptions = $resp->getSubscriptions();
        $subscriptionID = $subscriptions[0]->getSubscriptionId();

        $req = new ChangeSeatsRequest();
        $req->setDomain("domain.com");
        $req->setSubscriptionId($subscriptionID);
        $req->setSeats(1);

        try {
            $resp = $partnerClient->ChangeSeats($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::fail('error on ChangeSeats: ' . $e);
        }

        self::assertEquals(
            new Google\Protobuf\GPBEmpty(),
            $resp,
            'expected response to be GPBEmpty()',
        );
    }

    public function testUpdateSSOHappyPath()
    {
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $partnerClient = new PartnerServiceClient($environment);

        $req = new UpdateSSORequest();
        $req->setDomain("google.com");
        // disable SSO
        $req->setEnableSso(false);

        try {
            $resp = $partnerClient->UpdateSSO($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::fail('error on UpdateSSO: ' . $e);
        }

        self::assertEquals(
            new Google\Protobuf\GPBEmpty(),
            $resp,
            'expected response to be GPBEmpty()',
        );
    }

}
