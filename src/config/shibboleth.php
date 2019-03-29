<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Views / Endpoints
    |--------------------------------------------------------------------------
    |
    | Set your login page, or login routes, here. If you provide a view,
    | that will be rendered. Otherwise, it will redirect to a route.
    |
 */

    'idp_login' => 'https://uabks.arizona.edu/Shibboleth.sso/Login',
    'idp_logout' => 'https://uabks.arizona.edu/Shibboleth.sso/Logout?return=https%3A%2F%2Fshibboleth.arizona.edu%2Fcgi-bin%2Flogout.pl',
    'authenticated' => '/',

    /*
    |--------------------------------------------------------------------------
    | Emulate an IdP
    |--------------------------------------------------------------------------
    |
    | In case you do not have access to your Shibboleth environment on
    | homestead or your own Vagrant box, you can emulate a Shibboleth
    | environment with the help of Shibalike.
    |
    | The password is the same as the username.
    |
    | Do not use this in production for literally any reason.
    |
     */

    'emulate_idp' => false,
    'emulate_idp_users' => [
        'admin' => [
            'cn' => 'Admin User',
            'mail' => 'admin@email.arizona.edu',
            'givenName' => 'Admin',
            'sn' => 'User',
            'emplId' => 'admin',
        ],
        'staff' => [
            'cn' => 'Staff User',
            'mail' => 'staff@email.arizona.edu',
            'givenName' => 'Staff',
            'sn' => 'User',
            'emplId' => 'staff',
        ],
        'user' => [
            'cn' => 'User User',
            'mail' => 'user@email.arizona.edu',
            'givenName' => 'User',
            'sn' => 'User',
            'emplId' => 'user',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Server Variable Mapping
    |--------------------------------------------------------------------------
    |
    | Change these to the proper values for your IdP.
    |
     */

    'entitlement' => 'isMemberOf',

    'user' => [
        // fillable user model attribute => server variable
        'name' => 'cn',
        'email' => 'mail',
        'first_name' => 'givenName',
        'last_name' => 'sn',
        'emplid' => 'emplId',
    ],

    /*
    |--------------------------------------------------------------------------
    | User Creation and Groups Settings
    |--------------------------------------------------------------------------
    |
    | Allows you to change if / how new users are added
    |
     */

    'add_new_users' => true, // Should new users be added automatically if they do not exist?

    /*
    |--------------------------------------------------------------------------
    | JWT Auth
    |--------------------------------------------------------------------------
    |
    | JWTs are for the front end to know it's logged in
    |
    | https://github.com/tymondesigns/jwt-auth
    | https://github.com/StudentAffairsUWM/Laravel-Shibboleth-Service-Provider/issues/24
    |
     */

    'jwtauth' => env('JWTAUTH', false),
];
