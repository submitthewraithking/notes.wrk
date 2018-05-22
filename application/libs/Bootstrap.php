<?php
namespace libs;
$url = $_GET['url'];
$url = explode('/', $url);
if ($url[0])
{
    $className = '';
    $method_name = '';
    $verb = '';
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
                echo "waiting for entering button";
                $method_name = 'getLoginPage';
            }
            break;

        
        
        
        case 'registration':
            $className = '\controllers\userController';
            $obj = new $className;

            //if user click register button
            if (isset($_POST['register_submit']))
            {
                $fields = array('login', 'pass', 'repeat_pass', 'email', 'name', 'surname');
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
                    $method_name = 'getRegistrationPage';
                }else
                {
                    $method_name = 'login';
                    header("Location: http://notes.wrk/login");

                }
            }

            if (empty($_POST['login_submit']))
            {
                echo "waiting for entering button";
                $method_name = 'getRegistrationPage';
            }
            break;
    }
    $obj->$method_name();
    print_r($className);
    echo "<br>";
    print_r($method_name);

}
else
{
    $controller = new \controllers\Main();
}


