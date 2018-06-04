<?php
namespace models;

class Note extends BaseModel
{
    public function get_all_private_notes()
    {
        $val = $_SESSION['user_data'];
        $login = $val[0];
        var_dump($login);
        $result = BaseModel::$DATABASE->query("SELECT * FROM `notes` WHERE username = $login ");
        return $result;
    }
}