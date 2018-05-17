<?php
namespace controllers;
use \models;
class Register
{
    public function __construct()
    {
        require_once __DIR__ . '/../models/AfterRegistrationPage.php';
    }
    public function sendRegistrationLink()
    {
        mail("danilenko_work@mail.ru", "Registration", "Welcome to Dallas!
        \nTo continue, please follow <a href='http://notes.wrk/login'>the link</a> ");

    }
}
