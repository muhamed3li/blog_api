<?php

namespace Core\Middleware;

use Core\Authenticator;
use Exception;

class Authenticated
{
    public function handle()
    {
        if (! (new Authenticator)->isAuthenticated() ) {
            throw new Exception("Unauthorized", 403);
        }
    }
}