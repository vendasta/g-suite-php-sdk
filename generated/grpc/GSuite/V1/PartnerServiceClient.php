<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Gsuite\V1;

/**
 * Service that partners can use to interact with our API's
 */
class PartnerServiceClient extends \Grpc\BaseStub {

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
        return $this->_simpleRequest('/gsuite.v1.PartnerService/ListSubscriptions',
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
        return $this->_simpleRequest('/gsuite.v1.PartnerService/GetDomainInformation',
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
        return $this->_simpleRequest('/gsuite.v1.PartnerService/ChangeSeats',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Updates the SSO settings for a G Suite account
     * @param \Gsuite\V1\UpdateSSORequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function UpdateSSO(\Gsuite\V1\UpdateSSORequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.PartnerService/UpdateSSO',
        $argument,
        ['\Google\Protobuf\Empty', 'decode'],
        $metadata, $options);
    }

    /**
     * Gets the SSO settings for a G Suite account
     * @param \Gsuite\V1\GetSSORequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     */
    public function GetSSO(\Gsuite\V1\GetSSORequest $argument,
      $metadata = [], $options = []) {
        return $this->_simpleRequest('/gsuite.v1.PartnerService/GetSSO',
        $argument,
        ['\Gsuite\V1\GetSSOResponse', 'decode'],
        $metadata, $options);
    }

}
