<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Respect\Validation\Validator as v;

session_start();
require '../vendor/autoload.php';
$settings = require '../config/settings.php';

$app = new \Slim\App($settings);

$container = $app->getContainer();

// bind validation to container 
$container['validator'] = function($container){
    return new \App\Validation\Validator();
};

$container['flash'] = function ($container) {
    return new \Slim\Flash\Messages();
};
 
$container['dbconnect'] = function($container){
    $get_settings = $container->get('settings')['dbconnect'];
    $mysql_connection_string = "mysql:host=$get_settings[servername];dbname=$get_settings[dbname]";
    $conn = new PDO($mysql_connection_string, $get_settings['username'], $get_settings['password']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
};



$container['AuthController'] = function($container){
    return new \App\Controllers\Auth\AuthController($container);

};

// $container['EmailAvailable'] = function ($container) {
//     $books2Mapper = $container->get('AuthController');
// };
// // $app->add($this->container-dbconnect);


$container['UsersController'] = function($container){
    return new \App\Controllers\UsersController($container);

};

$container['PostsController'] = function($container){
    return new \App\Controllers\PostsController($container);

};


V::with('App\\Validation\\Rules\\');

// require '../app/Validation/Rules/EmailAvailable.php';
// get routes
require '../app/routes.php';

$app->run();