<?php
/**
 * Viewer by Controller
 * @author Maxime
 */

include_once '../vendor/autoload.php';
use App\Controller\Controller;

$uri = $_SERVER["REQUEST_URI"];

if (strpos($uri, "?")){
    $uri = substr_replace($uri, "", strpos($uri, "?"));
}
$uri = substr($uri, 1);
$uri = $uri . "Controller";


if($uri ==="Controller"){
    Controller::homeController();
} else if (method_exists('App\Controller\Controller', $uri)) {
    Controller::$uri();
} else {
    Controller::error404Controller();
}
