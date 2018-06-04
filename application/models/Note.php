<?php
namespace models;

class Note extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_my_notes($login)
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM `notes` WHERE username = '$login' ORDER BY date DESC");
        return $result;
    }

    public function get_all_non_private_notes()
    {
        $result = BaseModel::$DATABASE->query("SELECT * FROM `notes` WHERE private = 0 ORDER BY date DESC");
        return $result;
    }

    public function insertNote($header, $content, $user, $private)
    {
        $time = date("20y-m-d");
        var_dump($time);
        $result = BaseModel::$DATABASE->query("INSERT INTO `notes` (name, content, date, private, username)
               VALUES ('$header', '$content', '$time', '$private', '$user') ");
        return $result;
    }
}