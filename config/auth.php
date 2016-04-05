<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'admin',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */

    'guards' => [
        'user' =>[
            'driver' => 'session',
            'provider' => 'user',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admin',
        ],
        'merchant' => [
            'driver' => 'session',
            'provider' => 'merchant',
        ],
    ],  

    //User Providers
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admin' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'merchant' => [
            'driver' => 'eloquent',
            'model' => App\Merchant::class,
        ]
    ],  

    //Resetting Password  
    'passwords' => [
        'user' => [
            'provider' => 'user',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admin' => [
            'provider' => 'admin',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'merchant' => [
            'provider' => 'merchant',
            'email' => 'auth.emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],  

];
