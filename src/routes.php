<?php

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Slim\Views\PhpRenderer;
use Monolog\Logger;

// Routes

$app->get('/[{name}]', function (ServerRequestInterface $request, ResponseInterface $response, PhpRenderer $renderer, Logger $logger) {
    // Sample log message
    $logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $renderer->render($response, 'index.phtml', ['name' => $request->getAttribute('route')->getArgument('name')]);
});

$app->group('/api', function () use($app) {
    $app->get('/{name}', function (ServerRequestInterface $request, ResponseInterface $response) {
        var_dump($request->getAttribute('route')->getArgument('name'));
        return json_encode([
            'greeting' => 'Hello '.$request->getAttribute('route')->getArgument('name').'!'
        ]);
    });
});
