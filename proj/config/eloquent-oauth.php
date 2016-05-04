<?php

use App\User;

return [
    'model' => User::class,
    'table' => 'oauth_identities',
    'providers' => [
        'facebook' => [
            'client_id' => '1118003061584649',
            'client_secret' => '721d57e9fa83afe680217871115a9e8d',
            'redirect_uri' => 'https://people.eecs.ku.edu/~jpark83/project4/facebook/authorize',
            'scope' => [],
        ],
    ],
];
