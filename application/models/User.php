<?php

namespace models;
use libs\BaseController;

class User extends BaseModel
{
    //public $DATABASE
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

    public function insertUser($new_login, $new_pass, $new_email, $new_name, $new_surname)
    {
        
        $this->DATABASE->query("INSERT INTO `users` (login, hash, email, name, surname, role, Blocked_first_sign_in,
               Blocked_by_admin)
               VALUES ('$new_login', SHA2('$new_pass  $new_login', 256),
              '$new_email', '$new_name', '$new_surname', 1, 1, 0)");
        $_POST['just_registered'] = 1;
        //$this->sendRegistrationLink();
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