<?php
namespace controllers;

use libs\BaseController;
use \models;

class UserController extends BaseController
{
    //public $View(object of View)
    //public $View->render($a)
    //public $ErrMess
    //public $BaseModel
    //public lvl 2$DATABASE

    public $check;
    public $ErrorMessage = '';
    public $methodName;
    public $USER;

    public function __construct()
    {
        parent::__construct();
    }

    public function check_fields_registration()
    {
        $new_user_login = ($_POST['login']);
        $new_user_pass = ($_POST['pass']);
        $new_user_rep_pass = ($_POST['repeat_pass']);
        $new_user_email = ($_POST['email']);
        $new_user_name = ($_POST['name']);
        $new_user_surname = ($_POST['surname']);
        $ErrMess = '';
        if (isset($_POST['register_submit']))
        {
            $fields = array('login', 'pass', 'repeat_pass', 'email', 'name', 'surname');
            $complete = true;
            foreach ($fields as $field)
            {
                if (!$_POST[$field])
                {
                    $complete = false;
                    break;
                }
            }
            if (!$complete)
            {
                if (empty($new_user_surname))
                {
                    $ErrMess =  "Enter your surname!<br>";
                }
                if (empty($new_user_name))
                {
                    $ErrMess =  "Enter your name!<br>";
                }
                if (empty($new_user_email))
                {
                    $ErrMess =  "Enter your e-mail!<br>";
                }
                if (empty($new_user_rep_pass))
                {
                    $ErrMess =  "Repeat your password!<br>";
                }
                if (empty($new_user_pass))
                {
                    $ErrMess =  "Enter your password!<br>";
                }
                if (empty($new_user_login))
                {
                    $ErrMess = "Enter your login!<br>";
                }
                $method_name = 'getRegistrationPage';
            }
            else
            {
                $method_name = 'login';
                $ErrMess= 'idu na loginku';
                $this->registrate();
                $this->USER = new models\User();
                header("Location: http://notes.wrk/login");
            }
        }

        if (empty($_POST['register_submit']))
        {
            $method_name = 'getRegistrationPage';
            $ErrMess = '';
        }
        $this->ErrorMessage = $ErrMess;
        $this->methodName = $method_name;
    }

    public function getRegistrationPage()
    {
        $this->check_fields_registration();
        $this->view->Errmess = $this->ErrorMessage;
        $this->view->render('Registration');
    }

    public function registrate()
    {

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
