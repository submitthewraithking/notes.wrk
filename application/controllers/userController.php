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
        $this->sendRegistrationLink();
        require_once __DIR__ . '/../views/main/Register.php';
    }

    public function showLoginPage()
    {

    }

    public function showMainPage()
    {

    }

    public function sendRegistrationLink()
    {
        echo($this->message);
        mail("danilenko_work@mail.ru", "Registration", "Welcome to Dallas!
        \nTo continue, please follow <a href='http://notes.wrk/login'>the link</a> ");

    }
}
