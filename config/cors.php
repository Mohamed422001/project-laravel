<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'check-courses'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'], // يمكنك تحديد نطاقات محددة لاحقاً

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,
];
