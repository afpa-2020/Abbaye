<?php

namespace App\Controller;

class Controller
{
    public function homeController()
    {
        ob_start();
        include '../templates/index.php';
        ob_end_flush();
    }

    public function loginController()
    {
        ob_start();
        include '../templates/login.php';
        ob_end_flush();
    }

    public function signupController()
    {
        ob_start();
        include '../templates/signup.php';
        ob_end_flush();
    }

    public function error404Controller()
    {
        ob_start();
        include '../templates/404.php';
        ob_end_flush();
    }
}