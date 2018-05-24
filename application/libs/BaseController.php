<?php
namespace libs;

use controllers;
use models\User;

class BaseController
    {
        public $view;
        public $Basemodel;
        public $USER;
        
        public function __construct()
        {
            $this->view = new View();
        }

        public function render($templateName)
        {
            $this->view->render($templateName);
        }
    }
?>