<?php
namespace libs;

    class View
    {
        public $Errmess;
        public $Message;
        
        public function render($templateName, $Message)
        {
            echo $this->Errmess;
            echo "<br>";
            $this->Message = $Message;
            echo $this->Message;
            
            echo "<pre>";
            echo "POST: ";
            print_r($_POST);
            echo "<pre>";
            echo "SESSION: ";
            print_r($_SESSION);

            require_once __DIR__ . '/../views/' . $templateName. '.php';
        }
    }
//if (isset($_REQUEST['news_act'])
?>