<?php
session_start();

function __autoload($class)
{
  if (file_exists("controllers/".$class.".php"))
  {
    require_once "controllers/".$class.".php";
  }
  elseif (file_exists("models/".$class.".php"))
  {
    require_once "models/".$class.".php";
  }
}
?>