<?php
namespace libs;

    use controllers;

    class BaseController
    {
        public $view;
        
        protected function __construct()
        {
            $this->view = new View();
        }

        public function render($templateName)
        {
            $this->view->render($templateName);
        }
    }
?>