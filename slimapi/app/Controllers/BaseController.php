<?php
namespace App\Controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface as ContainerInterface;


abstract class BaseController{
    protected $ci;

    // constructor receives container instance
    public function __construct(ContainerInterface $ci) {
        $this->ci = $ci;
    }
}