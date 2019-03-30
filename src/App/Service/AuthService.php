<?php

namespace App\Service;

use App\Repository\UserRepository;
use App\Transformer\UserTransformer;
use App\ModelData\UserData;
use App\ModelData\AuthData;
use App\Helper\Messages;

class AuthService {
    private $repo;
    private $transformer;

    public function __construct(UserRepository $repo, UserTransformer $transformer){
        $this->repo = $repo;
        $this->transformer = $transformer;
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

        return [
            'user' => $this->transformer->transform($user)
        ];
    }
}