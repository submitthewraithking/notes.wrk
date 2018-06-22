<?php
namespace controllers;

use libs\BaseController;
use \models;

class UserController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRegistrationPage()
    {
        $this->view->render('Registration', $_SESSION['regmess'], '');
    }


    public function registrate()
    {
        $result = $this->validator->check_fields_registration(); //mas, ErrMess
        if ($result)
        {
            if ($result[0]!= null && $result[1] == '')
            {
                $this::$user->insertUser($result[0][0], $result[0][1], $result[0][2], $result[0][3],
                    $result[0][4]);
                unset($_SESSION['regmess']);
                $_SESSION['message'] = 'You have just registered! Follow the link in e-mail we already sent to you!';
                header("Location: http://localhost/login");


            }else
            {
                $_SESSION['regmess'] = $result[1];
                $_SESSION['just_registered'] = 0;
                header("Location: http://localhost/registration");
            }
        }else
        {
            $_SESSION['error'] = 'validator didnt get result!';
        }
    }


    public function getLoginPage()
    {
        $this->view->render('Login', $_SESSION['message'], '');
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
                header("Location: http://localhost/main");
            }else
            {
                $_SESSION['message'] = $result[1];
                header("Location: http://localhost/login");
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
                header("Location: http://localhost/my_notes");
            }elseif(isset($_POST['logout'])){
                unset($_SESSION['user_data']);
                header("Location: http://localhost/login");
                }
            else{
                $user = new models\Note();
                $_SESSION['message'] = "Hello, ". $this->currentUserLogin. "<br>";
                if($this->currentUserLogin == 'admin'){
                    $data = $user->getAllNotes();
                    $this->view->render('adminOpportunities', $_SESSION['message'], $data);


                }else{
                    $data = $user->get_all_non_private_notes();
                    $this->view->render('Main', $_SESSION['message'], $data);
                }
            }
        }
        else{
            header("Location: http://localhost/login");
        }

    }

    public function get_my_notes()
    {
        $data = $this->validator->userNote->getAllMyNotes($this->currentUserLogin);
        $this->view->render('MyNotes', '', $data);
        $_SESSION['message'] = '';

        if (isset($_POST['note_submit'])) {
            $result = $this->validator->check_fields_my_notes();
            $_SESSION['message'] = $result;
            header("Location: http://localhost/my_notes");
        }
        if (isset($_GET['to_all_notes'])){
            header("Location: http://localhost/main");
        }
    }

    public function editConcretePage()
    {
        $data = $this->validator->userNote->getConcreteNote($this->currentUrl[2], $this->currentUserLogin);
        $this->view->render('editConcreteNote', '', $data);
        $_SESSION['current_note_id'] = $this->currentUrl[2];

        if (isset($_POST['finish_edit_note'])) {
            $result = $this->validator->check_fields_concrete_note();
            $_SESSION['result'] = $result;
            $_SESSION['message'] = $result;
            header("Location: http://localhost/my_notes");
        }
    }

    public function deleteConcretePage()
    {
        $data = $this->validator->userNote->getConcreteNote($this->currentUrl[2], $this->currentUserLogin);
        $this->view->render('deleteConcreteNote', '', $data);

        if (isset($_POST['yes_delete'])) {
            $this->validator->userNote->deleteNote($this->currentUrl[2], $this->currentUserLogin);
            header("Location: http://localhost/my_notes");
        }
    }

    public function getConcretePage()
    {
        $data = $this->validator->userNote->getConcreteNote($this->currentUrl[1], $this->currentUserLogin);
        $this->view->render('concreteNote', '', $data);
    }

    public function showAllUsers()
    {
        $data = $this->validator->userModel->getAllUsers();
        $this->view->render('AllUsers', 'USERS LIST:', $data);
    }

    public function editUser()
    {
        $data = $this->validator->userModel->getUser('login', $this->currentUrl[3]);
        $this->view->render('editConcreteUser', $_SESSION['result'], $data);
        unset($_SESSION['result']);
        var_dump($data);

        if (isset($_POST['finish_edit_user'])) {
            $result = $this->validator->check_fields_concrete_user();
            $_SESSION['result'] = $result;

            if ($result == '')
            {
                header("Location: http://localhost/main/all_users");
            }else
            {
                header("Location: http://localhost/". implode('/', $this->currentUrl));
            }
        }
    }
}
