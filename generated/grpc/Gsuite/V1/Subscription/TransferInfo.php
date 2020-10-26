<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gsuite/V1/api.proto

namespace Gsuite\V1\Subscription;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>gsuite.v1.Subscription.TransferInfo</code>
 */
class TransferInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>int64 minimum_transferable_seats = 1;</code>
     */
    private $minimum_transferable_seats = 0;

    public function __construct()
    {
        \GPBMetadata\Gsuite\V1\Api::initOnce();
        parent::__construct();
    }

    /**
     * <code>int64 minimum_transferable_seats = 1;</code>
     */
    public function getMinimumTransferableSeats()
    {
        return $this->minimum_transferable_seats;
    }

    /**
     * <code>int64 minimum_transferable_seats = 1;</code>
     */
    public function setMinimumTransferableSeats($var)
    {
        GPBUtil::checkInt64($var);
        $this->minimum_transferable_seats = $var;
    }

}