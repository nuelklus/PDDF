<?php

$app->post('/auth/signup', 'AuthController:signup');//->add(new \App\Middlewares\Validation\UserValidationMiddleware);

$app->group('/posts', function(){
    $this->get('', 'PostsController:posts');
    $this->get('/{id}', 'PostsController:show');
    $this->post('', 'PostsController:store');
});

$app->group('/users', function(){
    $this->get('', 'UsersController:users');
    $this->get('/{id}', 'UsersController:show');
    $this->post('', 'UsersController:store');
});
?>