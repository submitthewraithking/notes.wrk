<?php
namespace  libs\support;

class Validator
{
    
    public function check_fields_registration()
    {
        $new_user_login = ($_POST['login']);
        $new_user_pass = ($_POST['pass']);
        $new_user_rep_pass = ($_POST['repeat_pass']);
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
                    $ErrMess = "Enter your surname!<br>";
                }
                if (empty($new_user_name)) {
                    $ErrMess = "Enter your name!<br>";
                }
                if (empty($new_user_email)) {
                    $ErrMess = "Enter your e-mail!<br>";
                }
                if (empty($new_user_rep_pass)) {
                    $ErrMess = "Repeat your password!<br>";
                }
                if (empty($new_user_pass)) {
                    $ErrMess = "Enter your password!<br>";
                }
                if (empty($new_user_login)) {
                    $ErrMess = "Enter your login!<br>";
                }
                $method_name = 'getRegistrationPage';
            } else 
            {
                $mas = array($new_user_login, $new_user_pass, $new_user_email, $new_user_name, $new_user_surname);
            }
        }

        if (empty($_POST['register_submit'])) {
            $method_name = 'getRegistrationPage';
            $ErrMess = '';
        }
        $this->methodName = $method_name;
        return array ($mas, $ErrMess);
    }
}