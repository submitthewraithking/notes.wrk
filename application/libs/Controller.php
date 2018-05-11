<?php
namespace libs;

    class Controller
    {
        public $view;
        function __construct()
        {;
            $this->view = new View();
            $this->view->render('main/index');
        }
    }
?>