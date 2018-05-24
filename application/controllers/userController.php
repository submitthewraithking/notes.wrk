<?php
namespace controllers;

use libs\BaseController;
use \models;

class userController extends BaseController
{
    //public view (object of View)
    //public view->render($a)
    //ErrMess
    public $check;
    public $message = "";
    public $ErrorMessage = '';
    public $methodName;
    
    public function __construct()
    {
        parent::__construct();
    }


    public function getRegistrationPage()
    {
        $this->check_fields();
        $this->view->Errmess = $this->ErrorMessage;
        $this->view->render('Registration');
    }

    public function check_fields()
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
                //$this->registrate();
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


    public function getLoginPage()
    {
        $this->message = 'You have just registered! To continue, please go to the link we already sent you by e-mail!';
        print_r($this->message);
        $this->view->render('Login');
    }










//
//
//    public function registrate()
//    {
//        $db = new \models\Database();
//        $result = $db->query("SELECT * FROM `users` WHERE login = '$new_user_login'");
//
//        if ($new_user_login === $result)
//        {
//            $this->message = "This login is already exists!";
//            print_r($this->message);
//            $_POST['just_registered'] = 0;
//            exit();
//        }else
//        {
//         $db->query("INSERT INTO `users` (login, hash, email, name, surname, role, Blocked_first_sign_in,
//                 Blocked_by_admin)
//                     VALUES ('$new_user_login', SHA2('$new_user_pass $new_user_login', 256),
//                   '$new_user_email', '$new_user_name', '$new_user_surname', 1, 1, 0)");
//            $_POST['just_registered'] = 1;
//            echo "registration success! write is off";
//            //$this->sendRegistrationLink();
//            exit();
//        }
//    }



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
