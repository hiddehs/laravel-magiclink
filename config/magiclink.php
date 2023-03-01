<?php

return [

    'token' => [
        /*
        |--------------------------------------------------------------------------
        | Token size
        |--------------------------------------------------------------------------
        |
        | Here you may specify the length of token to verify the identify.
        | Max value is 255 characters, it will be used if bigger value is set.
        |
        */
        'length' => 64,
    ],

    'url' => [
        /*
        |--------------------------------------------------------------------------
        | Path to Validate Token and Auto Auth
        |--------------------------------------------------------------------------
        |
        | Here you may specify the name of the path you'd like to use so that
        | the verify token and auth in system.
        |
        */
        'validate_path' => 'magiclink',
        /*
        |--------------------------------------------------------------------------
        | Path default to redirect
        |--------------------------------------------------------------------------
        |
        | Here you may specify the name of the path you'd like to use so that
        | the redirect when verify correct token.
        |
        */
        'redirect_default' => '/',
    ],

    /*
    |--------------------------------------------------------------------------
    | Response when token is invalid
    |--------------------------------------------------------------------------
    |
    | Here you may specify the class with method __invoke to get the response
    | when token is invalid
    |
    */
    'invalid_response' => [
        'class' => MagicLink\Responses\Response::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Disable default route
    |--------------------------------------------------------------------------
    |
    | If you wish use your custom controller, you can invalidate the
    | default route of magic link, mark this configuration as true,
    | and add your custom route with the middleware:
    | MagicLink\Middlewares\MagiclinkMiddleware
    |
    */
    'disable_default_route' => false,

    /*
    |--------------------------------------------------------------------------
    | Configure Captcha key for auto confirm
    |--------------------------------------------------------------------------
    |
    | When using ConfirmationRequired the confirmation page must make sure that
    | the link is not accessed by an emailclient / linkpreview visitor.
    | Configure your hcaptcha.com key to verify a human accessing the link.
    |
    */
    'confirmation' => [
        'hcaptcha_sitekey' => null
    ]
];
