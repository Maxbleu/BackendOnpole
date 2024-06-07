<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{

    protected $except = [
        "/api/login",
        "/api/signup",
        "/api/sesiones/insert",
        "/api/estadistica/update",
        "/api/user/update",
        "/api/user/logout",
        "/api/user/delete"
    ];

}
