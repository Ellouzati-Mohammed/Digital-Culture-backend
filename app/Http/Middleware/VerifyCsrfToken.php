<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'api/*', // Exclut toutes les routes API de la vérification CSRF
        'sanctum/csrf-cookie', // Exclut la route pour obtenir le cookie CSRF
    ];
}
