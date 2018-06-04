<?php
namespace libs;


//echo mail("danilenko_work@mail.ru","test message", "test message", "From: workdanilenko@gmail.com");

$url = $_GET['url'];
$url = explode('/', $url);

$request_type = $_SERVER['REQUEST_METHOD'];

if ($url[0])
{
    $className = '';
    $method_name = '';
    switch ($url[0])
    {
        case 'main':
            if ($request_type == 'GET') {
                $_SESSION['message'] = '';
            }
            $className = '\controllers\UserController';
            $method_name = 'showMainPage';
            break;

        case 'login':
            $className = '\controllers\UserController';
            if ($request_type == 'GET') {
                $method_name = 'getLoginPage';
            }elseif ($request_type == 'POST'){
                $method_name = 'to_mainpage';
            }
            break;

        case 'registration':
            $className = '\controllers\UserController';
            if($request_type == 'POST') {
                $method_name = 'registrate';
            }elseif ($request_type == 'GET'){
                $_SESSION['message'] = '';
                $method_name = 'getRegistrationPage';
            }
            break;
        
        case 'my_notes':
            $className = '\controllers\UserController';
            if ($request_type == 'POST'){
                $method_name = 'get_my_notes';
            }elseif ($request_type == 'GET') {
                $method_name = 'stay_at_main';
            }
            
            
    }
    $obj = new $className;
    $obj->$method_name();
}
else
{
    header("Location: http://notes.wrk/registration");
}


