<?php
namespace libs;
require_once __DIR__ .'/../models/Database.php';
session_start();
$url = $_GET['url'];
$url = explode('/', $url);
if ($url[0])
{
    $className = '';
    $method_name = '';
    $verb = '';
    switch ($url[0])
    {
        case 'main':
            $className = 'userController';
            $method_name = 'showMainPage';
            break;
        case 'login':
            $className = '\controllers\userController';
            if($verb == 'GET')
            {
                $method_name = 'showLoginPage';
            }
            else
            {
                // POST verb!
                $method_name = 'login';
            }
            break;
        case 'registration':
            $className = new \controllers\Registration();
            $method_name = 'do_nothing';
            break;
        case 'register':
            $className = '\controllers\Register';
            $method_name = 'sendRegistrationLink';
    }
    $obj = new $className;
    $obj->$method_name();

}
else
{
    $controller = new \controllers\Main();
}


