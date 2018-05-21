<?php
namespace libs;

//print_r(time());
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
            $className = '\controllers\userController';
            $method_name = 'showMainPage';
            break;

        case 'login':
            $className = '\controllers\userController';
            if (isset($_POST['login']))
            {
                $method_name = 'registrate';
            }
            else
            {
                $method_name = 'login';
            }
            break;

        case 'registration':
            $className = '\controllers\userController';
            $method_name = 'getRegistrationPage';
            break;
    }
    $obj = new $className;
    $obj->$method_name();

}
else
{
    $controller = new \controllers\Main();
}


