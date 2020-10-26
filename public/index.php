<?php
/**
 * Viewer by Controller
 * @author Maxime
 */

include_once '../vendor/autoload.php';
use App\Controller\Controller;

$uri = $_SERVER["REQUEST_URI"];

$uri = substr($uri, 1) . "Controller";

if($uri ==="Controller"){

    Controller::homeController();

} else if ( strpos($uri, 'customers') >= 0) {

    Controller::customersController();

} else if (method_exists('App\Controller\Controller', $uri)) {

    Controller::$uri();

} else {

    Controller::error404Controller();

}
