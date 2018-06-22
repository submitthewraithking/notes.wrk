<?php
namespace libs;

    class View
    {
        public $Errmess;
        public $Message;
        public function render($templateName, $Message, $data)
        {
            echo $this->Errmess;
            echo "<br>";
            $this->Message = $Message;
            echo $this->Message;
            echo "<pre>";
            echo "GET: ";
            print_r($_GET);
//
            echo "POST: ";
            print_r($_POST);
            echo "SESSION: ";
            print_r($_SESSION);
            require_once __DIR__ . '/../views/' . $templateName. '.php';
        }
    }
?>