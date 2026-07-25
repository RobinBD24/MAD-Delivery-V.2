<?php

return [
    'name' => env('APP_NAME', 'MAD Delivery'),
    'env' => env('APP_ENV', 'production'),
    'debug' => (bool) env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'locale' => env('APP_LOCALE', 'en'),
    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'en'),
    'key' => env('APP_KEY'),
    'cipher' => 'AES-256-CBC',
    'providers' => [
        \App\Providers\AppServiceProvider::class,
        \Illuminate\Foundation\Providers\ConsoleSupportServiceProvider::class,
        \Illuminate\Routing\RouteServiceProvider::class,
    ],
    'aliases' => [
        'App' => Illuminate\Support\Facades\App::class,
        'Route' => Illuminate\Support\Facades\Route::class,
        'DB' => Illuminate\Support\Facades\DB::class,
    ],
];
