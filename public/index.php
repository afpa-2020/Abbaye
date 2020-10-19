<?php

include_once '../vendor/autoload.php';
use App\Controller\Controller;

$control = new Controller;

$uri = $_SERVER['REQUEST_URI'];

if ($uri == "/"){
    
    $control->homeController();

} else if ($uri == "/login") {

    $control->loginController();

} else {

    $control->error404Controller();
}

dump($uri);