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

}
