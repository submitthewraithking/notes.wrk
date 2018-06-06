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
        if ($result)
        {
            if ($result[0] != null && $result[1] == '')
            {
                $this->User->insertUser($result[0][0], $result[0][1], $result[0][2], $result[0][3],
                    $result[0][4]);
                $_SESSION['message'] = 'You have just registered! Follow the link in e-mail we already sent to you!';
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


    public function getLoginPage()
    {
        $this->view->render('Login', $_SESSION['message']);
    }



    public function to_mainpage()
    {
        $result = $this->validator->check_fields_login();//mas, ErrMess
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
        if (isset($_SESSION['user_data']))
        {
            if (isset($_POST['to_my_notes'])) {
                header("Location: http://notes.wrk/my_notes");
            }else{
                $this->view->render('Main', $_SESSION['message']);
            }
        }elseif(isset($_POST['logout'])){
            {
                unset($_SESSION['user_data']);
                header("Location: http://notes.wrk/login");
            }
        }
        else{
                header("Location: http://notes.wrk/login");
        }

    }

    public function get_my_notes()
    {
        if (isset($_POST['note_submit'])) {
            $result = $this->validator->check_fields_my_notes();
            $_SESSION['message'] = $result;
            header("Location: http://notes.wrk/my_notes");
        }
        if (isset($_POST['copy_link'])){
            ob_start();
            
        }
    }

    public function stay_at_main()
    {
        $this->view->render('MyNotes', '');
        $_SESSION['message'] = '';
    }

    public function editConcreteNote()
    {
        if (isset($_POST['finish_edit_note']))
        {
            $result = $this->validator->check_fields_concrete_note();
            var_dump($result);
            if ($result == '')
            {
                header("Location: http://notes.wrk/my_notes");
            }else
            {
                $_SESSION['message'] = $result;
                header("Location: http://notes.wrk/?edit=".$_GET['edit']);
            }
        }
        elseif (empty($_POST['finish_edit_note']))
        {
            $this->view->render('MyNotes', '');
            if (isset($_POST['to_my_notes1']))
            {
                header("Location: http://notes.wrk/my_notes");
            }
        }
    }
}
