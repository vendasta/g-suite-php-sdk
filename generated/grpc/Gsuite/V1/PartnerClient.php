<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Gsuite\V1;

/**
 */
class PartnerClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * List the subscriptions for a G Suite customer
     * @param \Gsuite\V1\ListSubscriptionsRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function ListSubscriptions(\Gsuite\V1\ListSubscriptionsRequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.Partner/ListSubscriptions',
        $argument,
        ['\Gsuite\V1\ListSubscriptionsResponse', 'decode'],
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
        return $this->_simpleRequest('/gsuite.v1.Partner/GetDomainInformation',
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
        return $this->_simpleRequest('/gsuite.v1.Partner/ChangeSeats',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

}
