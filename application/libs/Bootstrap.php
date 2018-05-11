<?php
namespace libs;

echo "file bootstrap connected to project";
$url = $_GET['url'];
$url = explode('/', $url);
echo "<pre>";
print_r($url); // associative mas
$path = 'controllers/' .$url[0]. '.php'; //записываем полный1 путь в зависимости от того что ввел пользователь в браузрер
require 'application/'. $path;
$controller = new Main();



//$controller = new A(); //создаем объект класса в завесимости от метода (у нас пока что мейн)
//var_dump($controller);

