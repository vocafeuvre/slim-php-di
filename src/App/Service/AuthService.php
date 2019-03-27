<?php

namespace App\Service;

use Doctrine\ORM\EntityManager;
use App\Entity\User;

class AuthService {
    private $manager;

    public function __construct(EntityManager $em){
        $this->manager = $em;
    }

    public function register(User $user){

    }

    public function login(User $user){

    }
}