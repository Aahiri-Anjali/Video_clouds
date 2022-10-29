<?php

return [

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

    'google' => [
        'client_id' => '1093914881608-sc03phd3qnv2g5flva45097gkcq2f2uf.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://127.0.0.1:8000/callback/google',
      ], 

      'facebook' => [
        'client_id' => '1936317866759656',
        'client_secret' => '2d0e8f4207db8ffde234279dbb02f5a2',
        'redirect' => 'http://127.0.0.1:8000/callback/facebook',
      ], 

      'github' => [
        'client_id' => 'fddc93b1c8569c6847d5',
        'client_secret' => 'e277c50b07a223f298cbca612e3a8ea8507b8a44',
        'redirect' => 'http://localhost:8000/callback/github',
      ],

];
