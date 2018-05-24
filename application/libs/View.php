<?php
namespace libs;

    class View
    {
        public $Errmess;

        public function render($templateName)
        {
            echo $this->Errmess;
            require_once __DIR__ . '/../views/' . $templateName. '.php';
        }
    }
?>
