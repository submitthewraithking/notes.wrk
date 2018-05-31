<?php
namespace controllers;

use libs\BaseController;
use \models;

class UserController extends BaseController
{
    public $BaseController;
    public $check;
    public $Errmessage = '';
    public $methodName;
    public $user_data; //массив полей юзера
    public $User;
    //user = obj User

    public function __construct()
    {
        parent::__construct();
        $this->User = new models\User;
    }

    public function getRegistrationPage()
    {
        $this->view->render('Registration', $_SESSION['message']);
    }


    public function registrate()
    {
        $result = $this->validator->check_fields_registration(); //mas, ErrMess
        $_SESSION['message'] = $result[1];
        $_SESSION['user_data'] = $result[0][0];
        //var_dump($_SESSION);
        if ($result)
        {
            if ($result[0] != null && $result[1] == '')
            {
                $this->User->insertUser($result[0][0], $result[0][1], $result[0][2], $result[0][3],
                    $result[0][4]);
                $_SESSION['message'] = 'You have just registered! Follow the link in e-mail we already sent to you!';
                $_SESSION['just_registered'] = 1;
                header("Location: http://notes.wrk/login");


            }else
            {
                $_SESSION['just_registered'] = 0;
                $_SESSION['message'] = $result[1];
                header("Location: http://notes.wrk/registration");
            }
        }else
        {
            $this->view->Errmess = 'validator didnt get result!';
        }
    }

//    public function sendRegistrationLink()
//    {
//        echo mail("danilenko_work@mail.ru","test message", "test message", "From: workdanilenko@gmail.com");
//    }

    public function getLoginPage()
    {
        $this->view->render('Login', $_SESSION['message']);
    }



    public function to_mainpage()
    {
        $result = $this->validator->check_fields_login();//mas, ErrMess
        var_dump($result);
        $_SESSION['message'] = $result[1];
        $_SESSION['user_data'] = $result[0][0];
        if ($result)
        {
            if ($result[0] != null && $result[1] == '')
            {
                $_SESSION['message'] = $result[1];
                $_SESSION['user_data'] = $result[0];
                header("Location: http://notes.wrk/main");
            }else
            {
                $_SESSION['message'] = $result[1];
                header("Location: http://notes.wrk/login");
            }
        }else
        {
            $this->view->Errmess = 'validator didnt get result!';
        }
    }


    public function showMainPage()
    {
        $this->view->Message = 'hello, ' . $_SESSION['user_data'];
        $this->view->render('Main', $_SESSION['message']);
    }
}
