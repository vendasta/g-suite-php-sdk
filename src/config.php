<?php
namespace Vendasta\GSuite\V1;

class Config
{
    const ENVIRONMENT_PARAMS = [
        "PROD" => [
            'host' => 'google-admin-prod.apigateway.co:443',
            'scope' => 'https://google-admin-prod.apigateway.co',
            'url' => 'https://google-admin-prod.apigateway.co',
            'secure' => true,
        ],
        "DEMO" => [
            'host' => 'google-admin-demo.apigateway.co:443',
            'scope' => 'https://google-admin-demo.apigateway.co',
            'url' => 'https://google-admin-demo.apigateway.co',
            'secure' => true,
        ],
        "LOCAL" => [
            'host' => 'google-admin.vendasta-local.com',
            'scope' => 'http://google-admin.vendasta-local.com',
            'url' => 'http://google-admin.vendasta-local.com',
            'secure' => false,
        ]
    ];
}
