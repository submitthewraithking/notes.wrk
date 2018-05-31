<?php

namespace models;
use libs\BaseController;

class User extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insertUser($new_login, $new_pass, $new_email, $new_name, $new_surname)
    {
        BaseModel::$DATABASE->query("INSERT INTO `users` (login, hash, email, name, surname, role, Blocked_first_sign_in,
               Blocked_by_admin)
               VALUES ('$new_login', SHA2('$new_pass  $new_login', 256),
              '$new_email', '$new_name', '$new_surname', 1, 1, 0)");
        $_POST['just_registered'] = 1;
    }

    public function getUser($field, $value)
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM `users` WHERE $field = '$value'");
        return $result;
    }

    public function hash_exists($login, $pass)
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM users WHERE login = '$login' 
            AND hash = SHA2('$pass $login', 256)");

        var_dump($result);

        if ($result){
            return $result;
        }else {
            return 0;
        }
    }
   

    public function get_all_notes()
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM `notes` ");

        return $result;
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


    public function deleteUser()
    {
        
    }

    public function setRole()
    {
         
    }
}