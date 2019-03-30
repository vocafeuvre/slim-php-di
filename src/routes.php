<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Controller\HomeController;
use App\Controller\ApiController;
use App\Controller\AuthController;

// Routes
$app->get('/[{name}]', [HomeController::class, 'home']);

$app->group('/api', function () use($app) {
    $app->get('/{name}', [ApiController::class, 'hello']);
    $app->group('/auth', function () use ($app) {
        $app->post('/register', [AuthController::class, 'register']);
        $app->post('/login', [AuthController::class, 'login']);
    });
});
