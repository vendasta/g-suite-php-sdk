<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Gsuite\V1;

/**
 * Domain Service
 */
class DomainServiceClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * Get the verification information for a domain
     * @param \Gsuite\V1\VerifyDomainRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function VerifyDomain(\Gsuite\V1\VerifyDomainRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.DomainService/VerifyDomain',
        $argument,
        ['\Gsuite\V1\VerifyDomainResponse', 'decode'],
        $metadata, $options);
    }

}
