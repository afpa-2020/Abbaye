<?php

include_once '../vendor/autoload.php';
use App\Controller\Controller;

$uri = $_SERVER["REQUEST_URI"];

$uri = substr($uri, 1) . "Controller";

if($uri ==="Controller"){

    Controller::homeController();

} else if (method_exists('Controller', $uri)) {

    Controller::$uri();

} else {

    Controller::error404Controller();

}

dump($uri);