<?php

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use App\Service\AuthService;
use App\Helper\Deserializer;

use App\ModelData\UserData;
use App\ModelData\AuthData;

class AuthController {
    private $authService;
    private $deserializer;

    public function __construct(AuthService $authService, Deserializer $deserializer){
        $this->authService = $authService;
        $this->deserializer = $deserializer;
    }

    public function register(ServerRequestInterface $request, ResponseInterface $response){
        $requestBody = $request->getParsedBody();

        $modelData = $this->deserializer->deserialize(new UserData(), $requestBody);

        try {
            $responseData = $this->authService->register($modelData);
        } catch (\Exception $e) {
            $responseData = [
                'error' => [
                    'message' => $e->message,
                    'code' => $e->code
                ]
            ];
        }

        return $response->withJson([
            'data' => $responseData
        ], 200);
    }

    public function login(ServerRequestInterface $request, ResponseInterface $response){
        $requestBody = $request->getParsedBody();

        $modelData = $this->deserializer->deserialize(new AuthData(), $requestBody);

        $responseData = $this->authService->login($modelData);

        return $response->withJson([
            'data' => $responseData
        ], 200);
    }
}