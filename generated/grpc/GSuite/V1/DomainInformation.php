<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gsuite/V1/api.proto

namespace Gsuite\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * The domain information of the G Suite account
 * </pre>
 *
 * Protobuf type <code>gsuite.v1.DomainInformation</code>
 */
class DomainInformation extends \Google\Protobuf\Internal\Message
{
    /**
     * <pre>
     * The DNS TXT record for domain verification
     * </pre>
     *
     * <code>string dns_txt_record = 1;</code>
     */
    private $dns_txt_record = '';
    /**
     * <pre>
     * The status of the domain verification
     * </pre>
     *
     * <code>.gsuite.v1.DomainVerificationStatus status = 2;</code>
     */
    private $status = 0;
    /**
     * <pre>
     * The creation date of the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created_date = 3;</code>
     */
    private $created_date = null;
    /**
     * <pre>
     * The date of the verification for the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp verified_date = 4;</code>
     */
    private $verified_date = null;

    public function __construct() {
        \GPBMetadata\Gsuite\V1\Api::initOnce();
        parent::__construct();
    }

    /**
     * <pre>
     * The DNS TXT record for domain verification
     * </pre>
     *
     * <code>string dns_txt_record = 1;</code>
     */
    public function getDnsTxtRecord()
    {
        return $this->dns_txt_record;
    }

    /**
     * <pre>
     * The DNS TXT record for domain verification
     * </pre>
     *
     * <code>string dns_txt_record = 1;</code>
     */
    public function setDnsTxtRecord($var)
    {
        GPBUtil::checkString($var, True);
        $this->dns_txt_record = $var;
    }

    /**
     * <pre>
     * The status of the domain verification
     * </pre>
     *
     * <code>.gsuite.v1.DomainVerificationStatus status = 2;</code>
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * <pre>
     * The status of the domain verification
     * </pre>
     *
     * <code>.gsuite.v1.DomainVerificationStatus status = 2;</code>
     */
    public function setStatus($var)
    {
        GPBUtil::checkEnum($var, \Gsuite\V1\DomainVerificationStatus::class);
        $this->status = $var;
    }

    /**
     * <pre>
     * The creation date of the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created_date = 3;</code>
     */
    public function getCreatedDate()
    {
        return $this->created_date;
    }

    /**
     * <pre>
     * The creation date of the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp created_date = 3;</code>
     */
    public function setCreatedDate(&$var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->created_date = $var;
    }

    /**
     * <pre>
     * The date of the verification for the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp verified_date = 4;</code>
     */
    public function getVerifiedDate()
    {
        return $this->verified_date;
    }

    /**
     * <pre>
     * The date of the verification for the domain verification
     * </pre>
     *
     * <code>.google.protobuf.Timestamp verified_date = 4;</code>
     */
    public function setVerifiedDate(&$var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->verified_date = $var;
    }

}

