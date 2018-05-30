<?php
namespace models;


class Main extends User
{
    public $ErrMess;
    static public $all_notes;

    public function __construct()
    {
        parent::__construct();
        Main::$all_notes = $this->get_all_notes();
        print_r($this->ErrMess . "<br>");
    }
}
