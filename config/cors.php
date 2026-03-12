<?php

return [
    'paths'                    => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods'          => ['*'],

    // Update this to your Vercel frontend URL after deployment
    // e.g. 'https://ldms.vercel.app'
    'allowed_origins'          => ['*'],

    'allowed_origins_patterns' => [],
    'allowed_headers'          => ['*'],
    'exposed_headers'          => [],
    'max_age'                  => 0,
    'supports_credentials'     => false,
];
