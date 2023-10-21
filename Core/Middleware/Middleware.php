<?php

namespace Core\Middleware;

class Middleware
{
    public const MAP = [
        'auth' => Authenticated::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.", 500);
        }

        (new $middleware)->handle();
    }
}