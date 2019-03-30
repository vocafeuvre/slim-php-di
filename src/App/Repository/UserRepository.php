<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

use App\Entity\User;
use App\ModelData\UserData;
use App\ModelData\AuthData;

class UserRepository extends EntityRepository {
    public function save(UserData $data) {
        $userEntity = new User();

        $userEntity->setUserName($data->getField('user_name'));
        $userEntity->setPassword($data->getField('password'));
        $userEntity->setFirstName($data->getField('first_name'));
        $userEntity->setLastName($data->getField('last_name'));

        $this->_em->persist($userEntity);
        $this->_em->flush();

        return $userEntity;
    }

    public function fetchUserByAccount(AuthData $data){
        return $this->findOneBy([
            'user_name' => $data->getField('user_name'),
            'password' => $data->getField('password')
        ]);
    }
}