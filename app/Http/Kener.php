<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;

class Kernel extends HttpKernel
{

    /**
     * The application's route middleware groups.
     */
    protected $middlewareGroups = [
        'web' => [
            VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:api',
        ],
    ];
}
