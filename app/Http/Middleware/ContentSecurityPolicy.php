<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    public $resources = [
        'default-src' => [
            "'self'",
            "data:",
            "'unsafe-inline'",
            "'unsafe-eval'",
        ],
    ];

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        $contentSecurityPolicy = '';
        foreach ($this->resources as $key => $values) {
            $contentSecurityPolicy .= $key . ' ' . implode(' ', $values);
        }

        $response->header("Content-Security-Policy", "$contentSecurityPolicy");

        return $response;
    }
}
