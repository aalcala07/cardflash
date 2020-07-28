<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Route
    |--------------------------------------------------------------------------
    |
    | The path where Cardflash will be accessible.
    |
    */

    'path' => env('CARDFLASH_PATH_NAME', 'cardflash'),

    /*
    |--------------------------------------------------------------------------
    | User Model
    |--------------------------------------------------------------------------
    |
    | Specify the user model for authentication and defining the relationship
    | between a user and their card decks.
    |
    */

    'user' => Illuminate\Foundation\Auth\User::class,

    /*
    |--------------------------------------------------------------------------
    | Route Middleware
    |--------------------------------------------------------------------------
    |
    | These middleware will be attached to every route in Cardflash.
    |
    */

    'middleware' => [
        'web',
        'auth',
    ],


];