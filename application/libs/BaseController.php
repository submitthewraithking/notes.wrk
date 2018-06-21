<?php
namespace libs;

use controllers;
use libs\support\Validator;
use models\Note;
use models\User;

class BaseController
    {
        public $validator;
        public $view;
        static public $user;
        public static $Note;
        protected $val;
        protected $currentUrl;
        protected $currentUserLogin;

        public function __construct()
        {
            BaseController::$user = new User();
            BaseController::$Note = new Note();
            $this->view = new View();
            $this->validator = new Validator();
            $this->val = $_SESSION['user_data'];
            $this->currentUserLogin = $this->val[0];
            $url = $_GET['url'];
            $this->currentUrl = explode('/', $url);
        }
    }
?>