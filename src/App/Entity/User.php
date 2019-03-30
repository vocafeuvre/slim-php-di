<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User {
    /**
     * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $user_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $first_name;

    /**
     * @ORM\Column(type="string")
     */
    protected $last_name;

    public function getId(){
        return $this->id;
    }

    public function getUserName(){
        return $this->user_name;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getFirstName(){
        return $this->first_name;
    }

    public function getLastName(){
        return $this->last_name;
    }

    public function setUserName($value){
        $this->user_name = $value;
    }

    public function setPassword($value){
        $this->password = $value;
    }

    public function setFirstName($value){
        $this->first_name = $value;
    }

    public function setLastName($value){
        $this->last_name = $value;
    }
}