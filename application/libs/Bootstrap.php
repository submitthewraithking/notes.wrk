<?php
namespace libs;

use models\Database;

new Database();

$url = $_GET['url'];
$url = explode('/', $url);
if ($url[0])
{
    $className = '';
    $method_name = '';
    switch ($url[0])
    {
//        case 'main':
//            $className = '\controllers\userController';
//            $method_name = 'showMainPage';
//            break;
//
        case 'login':
            $className = '\controllers\UserController';
            $method_name = 'getLoginPage';
            break;

        case 'registration':
            $className = '\controllers\UserController';
            $method_name = 'getRegistrationPage';
            break;
    }
    $obj = new $className;
    $obj->$method_name();
}
else
{
    header("Location: http://notes.wrk/registration");
}


