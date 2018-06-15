<?php
namespace models;

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
               VALUES ('$new_login', SHA2('$new_pass $new_login', 256),
              '$new_email', '$new_name', '$new_surname', 1, 1, 0)");
    }

    public function getUser($field, $value)
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM users WHERE $field = '$value'");
        return $result;
    }

    public function hash_generate($login, $pass)
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM users WHERE hash = SHA2('$pass $login', 256)");
        if ($result){
            return $result;
        }else {
            return 0;
        }
    }

    public function getAllUsers()
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM users ");
        return $result;
    }

    public function editUser($login, $pass, $email, $role, $id)
    {
        $result = BaseModel::$DATABASE->query("UPDATE `users` SET login = '$login', hash = SHA2('$pass $login', 256), 
        email = '$email', role = '$role' WHERE id = '$id'");
        return $result;
    }

}