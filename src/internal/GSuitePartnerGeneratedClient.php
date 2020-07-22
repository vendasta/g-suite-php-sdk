<?php 
# Code generated by sdkgen
# Generated on 2020-07-21 20:19:09.857747509 +0000 UTC using container gcr.io/repcore-prod/sdkgen:latest
# DO NOT EDIT!
namespace Vendasta\GSuite\V1\internal;

use Vendasta\GSuite\V1\Config;

class GSuitePartnerGeneratedClient
{
    private $transport;
    
    /**
     * GSuitePartnerGeneratedClient constructor.
     * @param string $env one of \Vendasta\Vax\Environment::<Env>
     * @param float $default_timeout
     */
    public function __construct(string $env, float $default_timeout = 10000)
    {
        $this->transport = $this->getTransportClient($env, $default_timeout);
    }

    /**
     * @param string $env one of \Vendasta\Vax\Environment::<Env>
     * @param float $default_timeout
     * @return GSuitePartnerClientInterface
     */
    private function getTransportClient(string $env, float $default_timeout = 10000): GSuitePartnerClientInterface
    {
        $config = $this->getEnvConfig($env);

        if (class_exists('Grpc\ChannelCredentials', true)) {
            return new GSuitePartnerGRPCClient(
                $config['host'],
                $config['scope'],
                $config['secure'],
                $default_timeout
            );
        } else {
            return new GSuitePartnerHTTPClient(
                $config['host'],
                $config['scope'],
                $config['secure'],
                $default_timeout
            );
        }
    }

    /**
     * @param string $env one of \Vendasta\Vax\Environment::<Env>
     * @return array
     */
    private function getEnvConfig(string $env): array {
        return Config::ENVIRONMENT_PARAMS[$env];
    }
    
    /**
     * @param \Gsuite\V1\GetDomainAvailabilityRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Google\Protobuf\GPBEmpty proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function GetDomainAvailability(\Gsuite\V1\GetDomainAvailabilityRequest $req, array $options = []): \Google\Protobuf\GPBEmpty
    {
        return $this->transport->GetDomainAvailability($req, $options);
    }
    
    /**
     * @param \Gsuite\V1\VerifyDomainRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Gsuite\V1\VerifyDomainResponse proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function VerifyDomain(\Gsuite\V1\VerifyDomainRequest $req, array $options = []): \Gsuite\V1\VerifyDomainResponse
    {
        return $this->transport->VerifyDomain($req, $options);
    }
    
    /**
     * @param \Gsuite\V1\GetDomainInformationRequest $req proto request message
     * @param array $options optional options, possible keys:
     *              \Vendasta\Vax\RequestOptions::*
     * @return \Gsuite\V1\GetDomainInformationResponse proto response message
     * @throws \Vendasta\Vax\SDKException if this call encounters an error
     */
    public function GetDomainInformation(\Gsuite\V1\GetDomainInformationRequest $req, array $options = []): \Gsuite\V1\GetDomainInformationResponse
    {
        return $this->transport->GetDomainInformation($req, $options);
    }
    
}
