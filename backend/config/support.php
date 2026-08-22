<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Support Email
    |--------------------------------------------------------------------------
    |
    | Email address that should receive support requests. Falls back to
    | MAIL_FROM_ADDRESS when not set.
    |
    */
    'email' => env('SUPPORT_EMAIL', env('MAIL_FROM_ADDRESS', 'hello@example.com')),
];
