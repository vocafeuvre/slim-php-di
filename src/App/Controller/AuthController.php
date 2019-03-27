<?php

namespace Api\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Service\AuthService;

class AuthController {
    private $authService;

    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function register(ServerRequestInterface $request, ResponseInterface $response){

    }

    public function login(ServerRequestInterface $request, ResponseInterface $response){
        
    }
}