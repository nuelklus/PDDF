<?php

namespace App\Middlewares\Validation;

use  App\Middlewares\BaseMiddleware;

class UserValidationMiddleware extends BaseMiddleware {

    public function __invoke($request, $response, $next){
        
        var_dump('middleware');
        
        return $next($request, $response);
    }

}