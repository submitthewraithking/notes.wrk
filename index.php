<?php
//header('Content-Type: text/html; charset=utf8');
require './application/libs/Bootstrap.php';
function __autoload($className)
{
    $class_pieces = explode('\\', $className);
    switch ($class_pieces[0])
    {
        case 'controllers':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
        case 'libs':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
        case 'models':
            require __DIR__ . '/application/' . implode(DIRECTORY_SEPARATOR, $class_pieces) . '.php';
            break;
    }
}