<?php
namespace libs;


    class View
    {
        public function __construct()
        {
            echo "VIEW C";
            echo "<br>";
        }
        public function render($name)
        {
           require __DIR__ .'/../views/' .$name. '.php';
        }
    }
?>