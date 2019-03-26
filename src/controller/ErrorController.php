<?php

namespace App\src\controller;

use App\src\model\View;

class ErrorController
{
    private $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function error()
    {
        $this->view->render('error');
    }
}