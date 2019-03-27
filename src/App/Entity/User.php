<?php

namespace App\Entity;

/**
 * @Entity @Table(name="users")
 */
class User {
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="string)
     */
    protected $user_name;

    /**
     * @Column(type="string)
     */
    protected $password;

    /**
     * @Column(type="string)
     */
    protected $first_name;

    /**
     * @Column(type="string)
     */
    protected $last_name;

    public function getId(){
        return $this->$id;
    }

    public function getUserName(){
        return $this->$user_name;
    }

    public function getFirstName(){
        return $this->$first_name;
    }

    public function getLastName(){
        return $this->$last_name;
    }

    public function setUserName($value){
        $this->$user_name = $value;
    }

    public function setFirstName($value){
        $this->$first_name = $value;
    }

    public function setLastName($value){
        $this->$last_name = $value;
    }
}