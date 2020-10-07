<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Gsuite\V1;

/**
 * GSuitePartner provides RPCs to create and poll G Suite accounts
 */
class GSuitePartnerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Checks if a domain is available, returns AlreadyExists (409 Conflict) if the domain is not available
     * @param \Gsuite\V1\GetDomainAvailabilityRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetDomainAvailability(\Gsuite\V1\GetDomainAvailabilityRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.GSuitePartner/GetDomainAvailability',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Checks if the domain is verified for a G Suite account
     * @param \Gsuite\V1\VerifyDomainRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function VerifyDomain(\Gsuite\V1\VerifyDomainRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.GSuitePartner/VerifyDomain',
        $argument,
        ['\Gsuite\V1\VerifyDomainResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Get the domain information for a G Suite account
     * @param \Gsuite\V1\GetDomainInformationRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetDomainInformation(\Gsuite\V1\GetDomainInformationRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.GSuitePartner/GetDomainInformation',
        $argument,
        ['\Gsuite\V1\GetDomainInformationResponse', 'decode'],
        $metadata, $options);
    }

    /**
     * Changes the number of seats for a subscription
     * @param \Gsuite\V1\ChangeSeatsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ChangeSeats(\Gsuite\V1\ChangeSeatsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.GSuitePartner/ChangeSeats',
        $argument,
        ['\Gsuite\V1\ChangeSeatsResponse', 'decode'],
        $metadata, $options);
    }

}
