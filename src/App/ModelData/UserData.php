<?php

namespace App\ModelData;

use App\ModelData\ModelDataInterface;

class UserData implements ModelDataInterface {
    private $mapping;

    private $user_name;
    private $password;
    private $first_name;
    private $last_name;

    public function __construct() {
        $this->mapping = [
            'user_name',
            'password',
            'first_name',
            'last_name',
        ];
    }

    public function getMapping() {
        return $this->mapping;
    }

    public function setField(string $fieldName, $value) {
        $this->{$fieldName} = $value;
    }

    public function getField(string $fieldName) {
        return $this->{$fieldName};
    }
}