<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gsuite/V1/api.proto

namespace Gsuite\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * <pre>
 * A request to update the SSO settings for a G Suite account
 * </pre>
 *
 * Protobuf type <code>gsuite.v1.UpdateSSORequest</code>
 */
class UpdateSSORequest extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>string domain = 1;</code>
     */
    private $domain = '';
    /**
     * <code>bool enable_sso = 2;</code>
     */
    private $enable_sso = false;

    public function __construct() {
        \GPBMetadata\Gsuite\V1\Api::initOnce();
        parent::__construct();
    }

    /**
     * <code>string domain = 1;</code>
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * <code>string domain = 1;</code>
     */
    public function setDomain($var)
    {
        GPBUtil::checkString($var, True);
        $this->domain = $var;
    }

    /**
     * <code>bool enable_sso = 2;</code>
     */
    public function getEnableSso()
    {
        return $this->enable_sso;
    }

    /**
     * <code>bool enable_sso = 2;</code>
     */
    public function setEnableSso($var)
    {
        GPBUtil::checkBool($var);
        $this->enable_sso = $var;
    }

}
