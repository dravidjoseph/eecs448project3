<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '1118003061584649',
            'client_secret' => '721d57e9fa83afe680217871115a9e8d',
            'redirect_uri' => env("APP_URL").'/facebook/login',
            'scope' => [],
        ],
        'github' => [
            'client_id' => 'e5950068c8e9d9473098',
            'client_secret' => 'c70ec58ea8526cb146c24d91cc100e9c0fd1a837',
            'redirect_uri' => env("APP_URL").'github/login',
            'scope' => [],
        ],
    ],
];
