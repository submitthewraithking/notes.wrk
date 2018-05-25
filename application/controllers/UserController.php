<?php
namespace controllers;

use libs\BaseController;
use \models;

class UserController extends BaseController
{
    //public $view(object of View)
    //public $view->render($a)
    //public $ErrMess
    //public $user - User obj
    //public lvl 2$DATABASE
    public $BaseController;
    public $check;
    public $ErrorMessage = '';
    public $methodName;
    public $user_data;

    public function __construct()
    {
        parent::__construct();
    }

    public function getRegistrationPage()
    {
        $result = $this->validator->check_fields_registration(); //mas, ErrMess

        if ($result[0][0] != '') 
        {
            $this->user_data = $result[0];
            $this->view->Errmess = $result[1];
            $this->registrate();
            header("Location: http://notes.wrk/login");


        }else
        {
            $this->view->Errmess = $result[1];
            $this->view->render('Registration');
        }

    }

    public function registrate()
    {
        $this->user->insertUser($this->user_data[0], $this->user_data[1], $this->user_data[2],
        $this->user_data[3], $this->user_data[4]);
        $this->user_data = null;
    }




//    public function check_fields_login()
//    {
//        $new_user_login = ($_POST['login']);
//        $new_user_pass = ($_POST['pass']);
//        $ErrMess = '';
//        if (isset($_POST['login_submit']))
//        {
//            $fields = array('login', 'pass');
//            $complete = true;
//            foreach ($fields as $field)
//            {
//                if (!$_POST[$field])
//                {
//                    $complete = false;
//                    break;
//                }
//            }
//
//            if (!$complete)
//            {
//                if (empty($new_user_pass))
//                {
//                    $ErrMess =  "Enter your password!<br>";
//                }
//                if (empty($new_user_login))
//                {
//                    $ErrMess = "Enter your login!<br>";
//                }
//                $method_name = 'getLoginPage';
//            }
//            else
//            {
//                $method_name = 'main';
//                $ErrMess= 'idu na main';
//                header("Location: http://notes.wrk/main");
//            }
//        }
//
//        if (empty($_POST['login_submit']))
//        {
//            $method_name = 'getLoginPage';
//            $ErrMess = '';
//        }
//        $this->ErrorMessage = $ErrMess;
//        $this->methodName = $method_name;
//    }

    public function getLoginPage()
    {
        $this->message = 'You have just registered! To continue, please go to the link we already sent you by e-mail!';
        print_r($this->message);
        $this->view->render('Login');
    }




//    public function sendRegistrationLink()
//    {
//        $MESS = mail('danilenko_work@mail.ru', 'Registration', 'Welcome to notes.wrk!');
//        print_r($MESS);
//        if ($MESS)
//        {
//            echo "Your mail has sent successfully!";
//        }else
//        {
//            echo "Oops! Some problems with mail creating";
//        }
//
//    }
//

//
//    public function showMainPage()
//    {
//
//    }
}
