<?php

include_once '../vendor/autoload.php';
use App\Controller\Controller;

$uri = $_SERVER["REQUEST_URI"];

<<<<<<< HEAD
$uri = $_SERVER['REQUEST_URI'];
=======
$uri = substr($uri, 1) . "Controller";
>>>>>>> ee25b6f2f3394df76e24caa1f5d9648dc6fae79b

if($uri ==="Controller"){

    Controller::homeController();

} else if (method_exists('Controller', $uri)) {

    Controller::$uri();

} else {

    Controller::error404Controller();

}

<<<<<<< HEAD
dump($uri);
=======
dump($uri);
>>>>>>> ee25b6f2f3394df76e24caa1f5d9648dc6fae79b
