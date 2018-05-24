<?php

namespace models;
use libs\BaseController;

class User extends BaseModel
{
    //public $DATABASE
    private $password;
    private $email;
    private $name;
    private $surname;
    private $role;

    public function __construct()
    {
        parent::__construct();
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
        $this->DATABASE->query("INSERT INTO `users` (login, hash, email, name, surname, role, Blocked_first_sign_in,
               Blocked_by_admin)
               VALUES ('$new_user_login', SHA2('$new_user_pass $new_user_login', 256),
              '$new_user_email', '$new_user_name', '$new_user_surname', 1, 1, 0)");
        $_POST['just_registered'] = 1;
        echo "registration success! write is off";
        //$this->sendRegistrationLink();
        exit();
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