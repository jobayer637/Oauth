<?php

return [

    'google' => [
        'client_id' => '847311399674-9tah88tfu5b960vvi8im72nqj8ae502g.apps.googleusercontent.com',
        'client_secret' => 'KHCF-fkGXsb7jvql7e91yJK0',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],


    'github' => [
        'client_id' => '3a6ee5bd27d76c3cf548',
        'client_secret' => 'b15a50fa306da2b0d2cd7f5f92b41b8fe0bb0aca',
        'redirect' => 'http://localhost:8000/auth/github/callback',
    ],

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
