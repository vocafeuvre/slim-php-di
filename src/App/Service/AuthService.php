<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Transformer\UserTransformer;
use App\ModelData\UserData;
use App\ModelData\AuthData;
use App\Helper\Messages;

use \Firebase\JWT\JWT;

class AuthService {
    private $repo;
    private $transformer;
    private $jwtSecret;

    public function __construct(UserRepository $repo, UserTransformer $transformer, string $jwtSecret){
        $this->repo = $repo;
        $this->transformer = $transformer;

        $this->jwtSecret = $jwtSecret;
    }

    public function register(UserData $data){
        $savedUser = $this->repo->save($data);
        
        return [
            'user' => $this->transformer->transform($savedUser)
        ];
    }

    public function login(AuthData $data){
        $user = $this->repo->fetchUserByAccount($data);

        if(empty($user)) {
            return [
                'error' => [
                    'message' => Messages::ACCOUNT_DOESNT_EXIST
                ]
            ];
        }

        $now = new \DateTime();
        $future = new \DateTime("now +1 hours");

        $token = JWT::encode([
            'id' => $user->getId(),
            'user_name' => $user->getUserName(),
            'iat' => $now->getTimestamp(),
            'exp' => $future->getTimestamp()
        ], $this->jwtSecret, "HS256");

        return [
            'token' => $token,
            'user' => $this->transformer->transform($user)
        ];
    }
}