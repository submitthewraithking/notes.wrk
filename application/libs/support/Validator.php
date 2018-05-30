<?php
namespace  libs\support;

use models\User;


class Validator
{
    public $method_name;
    public $instance_user;
    public function __construct()
    {
        $this->instance_user = new User();
    }
    
    public function check_fields_registration()
    {
        $new_user_login = ($_POST['login']);
        $new_user_pass = ($_POST['pass']);
        $new_user_repeat_pass = ($_POST['repeat_pass']);
        $new_user_email = ($_POST['email']);
        $new_user_name = ($_POST['name']);
        $new_user_surname = ($_POST['surname']);
        $ErrMess = '';
        if (isset($_POST['register_submit'])) {
            $fields = array('login', 'pass', 'repeat_pass', 'email', 'name', 'surname');
            $complete = true;
            foreach ($fields as $field) {
                if (!$_POST[$field]) {
                    $complete = false;
                    break;
                }
            }
            if (!$complete) {
                if (empty($new_user_surname)) {
                    $ErrMess = "Enter your surname!";
                }
                if (empty($new_user_name)) {
                    $ErrMess = "Enter your name!";
                }
                if (empty($new_user_email)) {
                    $ErrMess = "Enter your e-mail!";
                }
                if (empty($new_user_repeat_pass)) {
                    $ErrMess = "Repeat your password!";
                }
                if (empty($new_user_pass)) {
                    $ErrMess = "Enter your password!";
                }
                if (empty($new_user_login)) {
                    $ErrMess = "Enter your login!";
                }
                $mas = null;
            }else
            {
                $result = $this->instance_user->getUser('login', $new_user_login);

                if ($new_user_login == $result[0]['login'])
                {
                    $ErrMess = "This login already exists!";
                    $mas = null;
                }
                elseif ($new_user_pass != $new_user_repeat_pass)
                {
                    $ErrMess = "Passwords dont match!";
                    $mas = null;
                }
                else
                {
                    $mas = array($new_user_login, $new_user_pass, $new_user_email, $new_user_name, $new_user_surname);
                    $ErrMess = '';
                }
            }
        }

        if (empty($_POST['register_submit']))
        {
            $ErrMess = '';
            $mas = null;
        }
        return array ($mas, $ErrMess);
    }

    
    
    
    
    



    public function check_fields_login()
    {
        $new_user_login = ($_POST['login']);
        $new_user_pass = ($_POST['pass']);
        $ErrMess = '';
        if (isset($_POST['login_submit'])) {
            $fields = array('login', 'pass');
            $complete = true;
            foreach ($fields as $field) {
                if (!$_POST[$field]) {
                    $complete = false;
                    break;
                }
            }
            if (!$complete) {
                if (empty($new_user_pass)) {
                    $ErrMess = "Enter your password!";
                }
                if (empty($new_user_login)) {
                    $ErrMess = "Enter your login!";
                }
                $mas = null;
            }else
            {
                $result1 = $this->instance_user->getUser('login', $new_user_login);
                $result2 = $this->instance_user->hash_exists("$new_user_pass", "$new_user_login");
                if (!$result1){
                    $ErrMess = "This user doesnt exist!";
                }

                elseif ($new_user_pass = $result2[0]['hash'])
                {
                    $ErrMess = "Incorrect password!";
                    $mas = null;
                }
                else
                {
                    $mas = array($new_user_login, $new_user_pass);
                    $ErrMess = '';
                }
            }
        }

        if (empty($_POST['login_submit']))
        {
            $ErrMess = '';
            $mas = null;
        }
        return array ($mas, $ErrMess);
    }
}