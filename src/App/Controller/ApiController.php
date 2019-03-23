<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

class ApiController {
    public function hello(ServerRequestInterface $request, ResponseInterface $response){
        return json_encode([
            'greeting' => 'Hello '.$request->getAttribute('route')->getArgument('name').'!'
        ]);
    }
}