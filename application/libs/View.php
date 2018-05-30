<?php
namespace libs;

    class View
    {
        public $Errmess;
        public $Message;
        
        public function render($templateName)
        {
            echo $this->Errmess;
            echo $this->Message;
            require_once __DIR__ . '/../views/' . $templateName. '.php';
        }
    }
?>
