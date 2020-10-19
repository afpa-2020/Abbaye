<?php

<<<<<<< HEAD
include_once '../vendor/autoload.php';
=======
require_once '../vendor/autoload.php';
>>>>>>> e5e0b3cdaea7c4f06144631b6309f9c2a5210d6e
use App\Controller\Controller;

$control = new Controller;

<<<<<<< HEAD
$uri = $_SERVER['REQUEST_URI'];

if ($uri == "/"){
    
    $control->homeController();

} else if ($uri == "/login") {

    $control->loginController();

} else {

    $control->error404Controller();
}

dump($uri);
=======
$control->homeController();
>>>>>>> e5e0b3cdaea7c4f06144631b6309f9c2a5210d6e
