<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Controller\HomeController;
use App\Controller\ApiController;

// Routes
$app->get('/[{name}]', [HomeController::class, 'home']);

$app->group('/api', function () use($app) {
    $app->get('/{name}', [ApiController::class, 'hello']);
});
