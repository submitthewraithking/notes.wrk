<?php
namespace libs;

use controllers;
use libs\support\Validator;
use models\BaseModel;
use models\User;

class BaseController
    {
        public $validator;
        public $view;
        public $user;

        public function __construct()
        {
            $this->user = new User();
            $this->view = new View();
            $this->validator = new Validator();
        }

        public function render($templateName)
        {
            $this->view->render($templateName);
        }
    }
?>