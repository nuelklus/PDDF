<?php

namespace App\Middlewares;

class BaseMiddleware{

    protected $ci;

    public function __constract(ContainerInterface $ci){
        $this->ci = $ci;
        


        return $next($request, $response);
    }

}