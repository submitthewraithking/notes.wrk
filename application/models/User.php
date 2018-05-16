<?php

namespace models;
class User
{
    private $password;
    private $email;
    private $name;
    private $surname;
    private $role;

    public function __construct()
    {
        $db = new \Database();
//        $db->execute("INSERT INTO users (login, hash, email, name, surname)
//        VALUES ('admin', 'qw3rfd13fd1e1fv', 'danilenko_work@mail.ru', 'Ilya', 'Danilenko')");
    }
    public function changePassword()
    {

    }

    public function changeEmail()
    {

    }

    public function changeName()
    {

    }

    public function changeSurname()
    {
        
    }

    public function insertUser()
    {
         
    }

    public function deleteUser()
    {
        
    }

    public function setRole()
    {
         
    }

    public function getRole()
    {
        
    }
}