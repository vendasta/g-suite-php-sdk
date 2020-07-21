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
            self::fail('unexpected failure');
            return;
        }

        self::assertNotEmpty(
            $resp->getDomainInformation(),
            'expected domain information to be returned',
        );
    }
}
