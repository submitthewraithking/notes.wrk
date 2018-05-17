<?php
namespace controllers;

class userController
{
    public $USER;
    public $message;
    public function __construct()
    {
        $this->USER = new \models\User();
    }

    public function login()
    {
        $this->message = 'You have just registered! To continue, please go to the link we already sent you by e-mail!';
        require_once __DIR__ . '/Register.php';
    }

    public function showLoginPage()
    {

    }

    public function showMainPage()
    {

    }


}
