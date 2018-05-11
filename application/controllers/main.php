<?php

namespace libs;
//use \application\libs;

class Main extends Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->view->render('main/index');
    }

}
