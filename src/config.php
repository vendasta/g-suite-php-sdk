<?php
namespace Vendasta\GSuite\V1;

class Config
{
    const ENVIRONMENT_PARAMS = [
        "PROD" => [
            'host' => 'g-suite-api-prod.vendasta-internal.com:443',
            'scope' => 'https://g-suite-api-prod.vendasta-internal.com',
            'url' => 'https://g-suite-api-prod.vendasta-internal.com',
            'secure' => true,
        ],
        "DEMO" => [
            'host' => 'g-suite-api-demo.vendasta-internal.com:443',
            'scope' => 'https://g-suite-api-demo.vendasta-internal.com',
            'url' => 'https://g-suite-api-demo.vendasta-internal.com',
            'secure' => true,
        ],
        "LOCAL" => [
            'host' => 'http://g-suite-api.vendasta-local.com',
            'scope' => 'http://g-suite-api.vendasta-local.com',
            'url' => 'http://g-suite-api.vendasta-local.com',
            'secure' => false,
        ]
    ];
}
