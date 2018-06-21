<?php
namespace models;

class Router{
    public function route()
    {
        $url = $_GET['url'];
        $url = explode('/', $url);
        $request_type = $_SERVER['REQUEST_METHOD'];
        echo "Request type: ";
        print_r($request_type . '<br>');
        if ($url[0])
        {
            $className = '';
            $method_name = '';
            switch ($url[0])
            {
                case 'main':
                    $className = '\controllers\UserController';
                    if (!empty($url[1])){
                        if ($url[1] == 'all_users'){
                            if ($url[2] && $url[2] == 'edit'){
                                if (!empty($url[3])){
                                    $method_name = "editUser";
                                }else{
                                    header("Location: http://localhost/all_users");
                                }
                            }elseif($url[2] && $url[2] == 'delete'){
                                $method_name = "deleteUser";
                            }else{
                                $method_name = "showAllUsers";
                            }
                        }else{
                            header("Location: http://localhost/main");
                        }
                    }
                    else{
                        $method_name = "showMainPage";
                    }
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
                        $method_name = 'getRegistrationPage';
                    }
                    break;

                case 'my_notes':
                    $className = '\controllers\UserController';
                    if (!empty($url[2])){
                        if ($url[1] == 'edit') {
                            $method_name = 'editConcretePage';
                        }elseif ($url[1] == 'delete'){
                            if ($request_type == 'POST') {
                                $method_name = 'deleteConcretePage';
                            } elseif ($request_type == 'GET') {
                                $method_name = 'getLoginPage';
                            }
                        }
                    }else{
                        $method_name = 'get_my_notes';
                    }
                    break;
                case 'note':
                    $className = '\controllers\UserController';
                    $method_name = 'getConcretePage';
                    break;
            }
            $obj = new $className;
            $obj->$method_name();
        }
        else
        {
            header("Location: http://localhost/registration");
        }
    }
}

?>