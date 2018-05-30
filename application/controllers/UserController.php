<?php
namespace controllers;

use libs\BaseController;
use \models;

class UserController extends BaseController
{
    public $BaseController;
    public $check;
    public $ErrorMessage = '';
    public $methodName;
    public $user_data; //массив полей юзера
    public $User;
    public $message;
    //user = obj User

    public function __construct()
    {
        parent::__construct();
        $this->User = new models\User();
    }

    public function getRegistrationPage()
    {
        $result = $this->validator->check_fields_registration(); //mas, ErrMess
        if ($result) 
        {
            if ($result[0] != null && $result[1] == '')
            {
                $this->user_data = $result[0];
                $this->view->Errmess = $result[1];
                $this->view->Message = 'You have just registered! To continue, please go to the link we already sent you by e-mail!';
                $this->registrate();
                //$this->sendRegistrationLink(); not working
                $_POST['just_registered'] = 1;
                header("Location: http://notes.wrk/login");

            }else
            {
                $_POST['just_registered'] = 0;
                $this->view->Errmess = $result[1];
                $this->view->render('Registration');
            }
        }else
        {
            $this->view->Errmess = 'validator didnt get result!';
        }

    }

    public function registrate()
    {
        $this->User->insertUser($this->user_data[0], $this->user_data[1], $this->user_data[2],
        $this->user_data[3], $this->user_data[4]);
        $this->user_data = null;
    }

    public function sendRegistrationLink()
    {
        //echo mail("danilenko_work@mail.ru","test message", "test message", "From: workdanilenko@gmail.com");
    }
    
    public function getLoginPage()
    {
        $result = $this->validator->check_fields_login(); //mas, ErrMess
        if ($result)
        {
            if ($result[0] != null && $result[1] == '')
            {
                $this->user_data = $result[0];
                $this->view->Errmess = $result[1];
                //$this->view->Message = 'Welcome,' . $result[0]['login'] . '!';
                header("Location: http://notes.wrk/main");
            } else
            {
                $this->view->Errmess = $result[1];
                $this->view->render('Login');
            }
        }else
        {
            $this->view->Errmess = 'validator didnt get result!';
        }
        
    }

    public function showMainPage()
    {

        $this->view->render('Main');
    }
}
