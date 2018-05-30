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

        public function __construct()
        {
            BaseController::$user = new User();
            $this->view = new View();
            $this->validator = new Validator();
        }
    }
?>