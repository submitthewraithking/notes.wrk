<?php
namespace  libs\support;

use models\Note;
use models\User;

class Validator
{
    public $method_name;
    public $userModel;
    public $userNote;
    public function __construct()
    {
        $this->userModel = new User();
        $this->userNote = new Note();
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
                $result = $this->userModel->getUser('login', $new_user_login);

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
                $result1 = $this->userModel->getUser('login', $new_user_login);
                $result2 = $this->userModel->hash_generate($new_user_login, $new_user_pass);
                if (!$result1){
                    $ErrMess = "This user doesnt exist!";
                    $mas = null;
                }
                elseif (!$result2)
                {
                    $ErrMess = "Incorrect password!";
                    $mas = null;
                }
                elseif ($result1[0]['Block_first_sign_in'] === 1){
                    $ErrMess = "You cant sign now. You should follow the link on your e-mail!";
                    $mas = null;
                }
                elseif ($result1[0]['Blocked_by_admin'] === 1){
                    $ErrMess = "You have been banned by administrator! You cant sign in anymore!";
                    $mas = null;
                }
                else
                {
                    $mas = array($new_user_login);
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

    public function check_fields_my_notes()
    {
        $new_note_header = ($_POST['header']);
        $new_note_content = ($_POST['content']);
        //$private =
        $ErrMess = '';
            $fields = array('header', 'content');
            $complete = true;
            foreach ($fields as $field) {
                if (!$_POST[$field]) {
                    $complete = false;
                    break;
                }
            }
            if (!$complete) {
                if (empty($new_note_content)) {
                    $ErrMess = "Enter your note text!";
                }
                if (empty($new_note_header)) {
                    $ErrMess = "Enter your note header!";
                }
            }else
            {
                $ErrMess = '';
                $val = $_SESSION['user_data'];
                $login2 = $val[0];
                if (isset($_POST['private'])){
                    $this->userNote->insertNote($new_note_header, $new_note_content, $login2, 1);
                }elseif(!($_POST['private'])){
                    $this->userNote->insertNote($new_note_header, $new_note_content, $login2, 0);
                }
            }
        return $ErrMess;
    }

    public function check_fields_concrete_note()
    {
        $new_note_header = ($_POST['header_edit']);
        $new_note_content = ($_POST['content_edit']);
        $ErrMess = '';
        $fields = array('header_edit', 'content_edit');
        $complete = true;
        foreach ($fields as $field) {
            if (!$_POST[$field]) {
                $complete = false;
                break;
            }
        }
        if (!$complete) {
            if (empty($new_note_content)) {
                $ErrMess = "Enter your note text!";
            }
            if (empty($new_note_header)) {
                $ErrMess = "Enter your note header!";
            }
        }else
        {
            $ErrMess = '';
            $userdata = $_SESSION['user_data'];
            $user = $userdata[0];
            $_SESSION['user'] = $user;
            if (isset($_POST['private_edit'])){
                $this->userNote->editNote($new_note_header, $new_note_content,
                    1, $_SESSION['current_note_id'], $user);
            }elseif(!($_POST['private_edit'])){
                $this->userNote->editNote($new_note_header, $new_note_content,
                    0, $_SESSION['current_note_id'], $user);
            }
        }
        return $ErrMess;
    }

    public function check_fields_concrete_user()
    {
        $new_user_login = ($_POST['login_edit']);
        $new_user_pass = ($_POST['pass_edit']);
        $new_user_repeat_pass = ($_POST['repeat_pass_edit']);
        $new_user_email = ($_POST['email_edit']);
        $ErrMess = '';
        $fields = array('login_edit', 'pass_edit', 'repeat_pass_edit', 'email_edit');
        $complete = true;
        foreach ($fields as $field) {
            if (!$_POST[$field]) {
                $complete = false;
                break;
            }
        }
        if (!$complete) {
            if (empty($new_user_email)) {
                $ErrMess = "Enter your new e-mail!";
            }
            if (empty($new_user_repeat_pass)) {
                $ErrMess = "Repeat your pass!";
            }
            if (empty($new_user_pass)) {
                $ErrMess = "Enter your password!";
            }
            if (empty($new_user_login)) {
                $ErrMess = "Enter your login!";
            }
        } else {
            if ($new_user_pass !== $new_user_repeat_pass) {
                $ErrMess = "Repeat your pass!";
            } else {
                $ErrMess = '';
                $userdata = $_SESSION['user_data'];
                $user = $userdata[0];
                $_SESSION['user'] = $user;
                if (isset($_POST['1_user'])) {
                    $this->userModel->editUser($new_user_login, $new_user_pass,
                         $new_user_email, 1, $user);
                } elseif (isset($_POST['2_redactor'])) {
                    $this->userModel->editUser($new_user_login, $new_user_pass,
                         $new_user_email, 2, $user);
                } elseif (isset($_POST['3_admin'])) {
                    $this->userModel->editUser($new_user_login, $new_user_pass,
                         $new_user_email, 3, $user);
                }else{
                    $ErrMess = 'no data!';
                }
            }
        }
        return $ErrMess;
    }
}