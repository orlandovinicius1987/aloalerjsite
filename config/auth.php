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

    'authentication' => [
        'mock' => env('APP_AUTHENTICATION_MOCKED', false),
        'enabled' => env('APP_AUTHENTICATION_ENABLED', env('APP_AUTHENTICATION', true)),
    ],

    'authorization' => [
        'mock' => env('APP_AUTHORIZATION_MOCKED', false),
        'enabled' => env('APP_AUTHORIZATION_ENABLED', env('APP_AUTHORIZATION', true)),
    ],

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'timeout' => env('AUTH_TIMEOUT', 2),

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
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Data\Models\User::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],

    'remote' => [
        'permissions' => [
            'url' => env(
                'AUTH_PERMISSIONS_API',
                'https://apiportal.alerj.rj.gov.br/api/v1.0/adm-user/K7k8H95loFpTH0ZTRKX2BhADIusjXHInHW3cspyosOoNrbd5jOG3pd61F4d6fg584Gg5h4DSjui1k/permissions'
            ),
        ],
        'login' => [
            'url' => env(
                'AUTH_LOGIN_API',
                'https://apiportal.alerj.rj.gov.br/api/v1.0/ldap/0IYFFiMHuUr1sYo6wEtjUsJQ7Zicg33SMuvtrFk9yEgwrORmblNSMdpTH0ZTRKX2BhADIusjXHInHW3cspyosOoNrbd5jObK5Uoh/login'
            ),
        ],
        'user_info' => [
            'url' => env(
                'AUTH_USER_INFO',
                'https://apiportal.alerj.rj.gov.br/api/v1.0/ldap/0IYFFiMHuUr1sYo6wEtjUsJQ7Zicg33SMuvtrFk9yEgwrORmblNSMdpTH0ZTRKX2BhADIusjXHInHW3cspyosOoNrbd5jObK5Uoh/user'
            ),
        ],
    ],
];
