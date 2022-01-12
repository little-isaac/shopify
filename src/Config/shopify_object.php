<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Shopify Api
    |--------------------------------------------------------------------------
    |
    | This file is for setting the credentials for shopify api key and secret.
    |
    */

    'key' => env("SHOPIFY_KEY", null),
    'secret' => env("SHOPIFY_SECRET", null),
    'return_url' => env("SHOPIFY_RETURN_URL", null),
    'callback_url' => env("SHOPIFY_CALLBACK_URL", null),
    'version' => env("SHOPIFY_API_VERSION", '2022-01'),
];