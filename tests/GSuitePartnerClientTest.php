<?php

use Gsuite\V1\GetDomainInformationRequest;
use PHPUnit\Framework\TestCase;
use Vendasta\GSuite\V1\GSuitePartnerClient;

class GSuitePartnerClientTest extends TestCase
{
    public function testGetDomainInformationHappyPath()
    {
        $environment = getenv("ENVIRONMENT");
        if ($environment == null) {
            $environment = "DEMO";
        }
        $client = new GSuitePartnerClient($environment);

        $req = new GetDomainInformationRequest();
        $req->setDomain("google.com");

        try {
            $resp = $client->GetDomainInformation($req);
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
        $gSuitePartnerClient = new GSuitePartnerClient($environment);
        $partnerClient = new PartnerClient($environment);

        $req = new ListSubscriptionsRequest();
        $req->setDomain("domain.com");

        try {
            $resp = $partnerClient->ListSubscriptions($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::fail('error on ListSubscriptions', $e);
        }

        $subscriptions = $resp->getSubscriptions();
        $subscriptionID = $subscriptions[0]->getSubscriptionId();

        $req = new ChangeSeatsRequest();
        $req->setCustomerId("domain.com");
        $req->setSubscriptionId($subscriptionID);
        $req->setSeats(1);

        try {
            $resp = $client->ChangeSeats($req);
        } catch (Vendasta\Vax\SDKException $e) {
            self::fail('error on ChangeSeats', $e);
        }

        self::assertNotEmpty($resp->getSeats(), 'expected seats to be returned');
    }
}
