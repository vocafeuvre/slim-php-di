<?php

namespace App\ModelData;

use App\ModelData\ModelDataInterface;

class AuthData implements ModelDataInterface {
    private $mapping;

    private $user_name;
    private $password;

    public function __construct() {
        $this->mapping = [
            'user_name',
            'password',
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