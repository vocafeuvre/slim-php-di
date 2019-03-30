<?php

namespace App\Transformer;

use App\Entity\User;

class UserTransformer {
    /**
     * Transforms a User entity into an json-able array.
     * 
     * @param User $user
     * 
     * @return array
     */
    public function transform(User $user) {
        $output = [
            'id' => $user->getId(),
            'user_name' => $user->getUserName(),
            'first_name' => $user->getFirstName(),
            'last_name' => $user->getLastName(),
        ];

        return $output;
    }

    /**
     * Transforms a collection of User entities into an json-able array.
     * 
     * @param User[] $users
     * 
     * @return array
     */
    public function transformCollection(array $users) {
        $output = [];

        foreach($users as $user) {
            $output[] = $this->transform($user);
        }

        return $output;
    }
}