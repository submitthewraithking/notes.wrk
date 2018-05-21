<?php
namespace controllers;

class userController
{
    public $USER;
    public $getLoginPage;
    public $getRegistrationPage;
    public $RegMessage;
    public $message = "";


    public function create_user()
    {
        $this->USER = new \models\User;
    }

    public function login()
    {
        $this->RegMessage = 'You have just registered! To continue, please go to the link we already sent you by e-mail!';
        print_r($this->RegMessage);
        $this->getLoginPage = new \models\Login;
        $this->sendRegistrationLink();
    }

    public function getRegistrationPage()
    {
        $this->getRegistrationPage = new \models\Registration;
    }

    public function registrate()
    {
        $this->getRegistrationPage();
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
            $this->message = "Enter all fields!";
        } else
        {
            $new_user_login = ($_POST['login']);
            $new_user_pass = ($_POST['pass']);
            $new_user_rep_pass = ($_POST['repeat_pass']);
            $new_user_email = ($_POST['email']);
            $new_user_name = ($_POST['name']);
            $new_user_surname = ($_POST['surname']);

            $db = new \models\Database();

            $result = $db->execute("SELECT * FROM `users` WHERE login = '$new_user_login'");
            var_dump($result);
            if ($new_user_pass !== $new_user_rep_pass)
            {
                $this->message = "Passwords dont match!";
                print_r($this->message);
                $_SESSION['just_registered'] = 0;
                exit();
            }
            if ($db->query("SELECT * FROM `users` WHERE login = '$new_user_login'"))
            {
                $this->message = "This login is already exists!";
                print_r($this->message);
                $_SESSION['just_registered'] = 0;
                exit();
            } else
            {
                $db->query("INSERT INTO `users` (login, hash, email, name, surname, role, Blocked_first_sign_in,
                              Blocked_by_admin)
                              VALUES ('$new_user_login', SHA2('$new_user_pass $new_user_login', 256),
                              '$new_user_email', '$new_user_name', '$new_user_surname', 1, 1, 0)");
                $_SESSION['just_registered'] = 1;
               // header("Location: http;//notes.wrk");
                exit();
            }
        }
        print_r($this->message);
        echo "2";
    }



    public function sendRegistrationLink()
    {
        $MESS = mail('danilenko_work@mail.ru', 'Registration', 'Welcome to notes.wrk!');
        print_r($MESS);
        if ($MESS)
        {
            echo "Your mail has sent successfully!";
        }else
        {
            echo "Oops! Some problems with mail creating";
        }

    }

    public function showLoginPage()
    {
        $this->getLoginPage = new \models\Login;
    }

    public function showMainPage()
    {

    }
}
