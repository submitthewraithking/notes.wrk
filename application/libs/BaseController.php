<?php
namespace libs;

use controllers;
use libs\support\Validator;
use models\User;

class BaseController
    {
        public $validator;
        public $view;
        static public $user;
        protected $val;
        protected $url2;
        protected $login2;

        public function __construct()
        {
            BaseController::$user = new User();
            $this->view = new View();
            $this->validator = new Validator();
            $this->val = $_SESSION['user_data'];
            $this->login2 = $this->val[0];
            $this->url2 = $_GET['url'];
            $this->url2 = explode('/', $this->url2);
        }
    }
?>