<?php

use Marketplaceful\Features;

return [

    'models' => [
        /*
         * The model you want to use as a User model.
         */
        'user' => env('MARKETPLACEFUL_USER_MODEL', App\Models\User::class),
    ],

    /*
    * If you are using a Marketplacfeul Pro license,
    * leave this as true so the pro features are enabled.
    */

    'pro' => false,

    /*
    * This is the default currency that will be used when generating charges
    * from your application.
    */

    'currency' => env('MARKETPLACEFUL_CURRENCY', 'usd'),

    /*
    * This is the default locale in which your money values are formatted in
    * for display.
    */

    'currency_locale' => env('MARKETPLACEFUL_CURRENCY_LOCALE', 'en'),

    /*
    * Some of the Marketplaceful features are optional. You may disable the features
    * by removing them from this array.
    */

    'features' => [
        // Features::authentication(),
    ],
];
