<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use Slim\Views\PhpRenderer;
use Monolog\Logger;

class HomeController {
    private $renderer;
    private $logger;

    public function __construct(PhpRenderer $renderer, Logger $logger){
        $this->renderer = $renderer;
        $this->logger = $logger;
    }

    public function home($request, $response){
        // Sample log message
        $this->logger->info("Slim-Skeleton '/' route");

        // Render index view
        return $this->renderer->render($response, 'index.phtml', ['name' => $request->getAttribute('route')->getArgument('name')]);
    }
}