<?php

/*Configuration file for Sprii API.*/
return [
    'api_key' => env('SPRII_API_KEY', null),
    'api_url' => env(
        'SPRII_API_URL',
        'https://app.sprii.io/functions/api/v1'
    ),

    /*Cache time*/
    'cache_time' => intval(env('SPRII_CACHE_DEFAULT_TTL', 86400)),
];