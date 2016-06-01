<?php

    /*
    |--------------------------------------------------------------------------
    | Rockid configuration
    |--------------------------------------------------------------------------
    |
    | This package depends on jenssegers/optimus and we need 3 things:
    | - Large prime number lower than 2147483647
    | - The inverse prime so that (PRIME * INVERSE) & MAXID == 1
    | - A large random integer lower than 2147483647
    |
    | You can generate and set your own. Just run the following:
    |
    | >> php artisan rockid:generate
    |
    | and change the values here.
    |
    */

    return [
        'prime' => 2123809381,
        'inverse' => 1885413229,
        'random' => 146808189
    ];