<?php
namespace libs;

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
            $className = '\controllers\userController';
            $obj = new $className;

            if (isset($_POST['login_submit']))
            {
                $fields = array('login', 'pass');
                $complete = true;
                foreach ($fields as $field)
                {
                    if (!$_POST[$field])
                    {
                        $complete = false;
                        break;
                    }
                }
                if (!$complete)
                {
                    echo "Enter all fields!";
                    $method_name = 'getLoginPage';
                }else
                {
                    $method_name = 'main';
                    header("Location: http://notes.wrk/main");

                }
            }

            if (empty($_POST['login_submit']))
            {
                $method_name = 'getLoginPage';
            }
            break;
        
        case 'registration':
            $className = '\controllers\userController';
            $obj = new $className; //cоздался объект userController
            $method_name = 'getRegistrationPage';
            break;
    }
    $obj->$method_name();
}
else
{
    $controller = new \controllers\Main();
}


