<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;
use App\Repository\DocumentRepository;
use App\Forms\RegisterForm;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;
use App\Forms\LoginForm;

abstract class Controller
{
    public static function homeController()
    {
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $userRepository = new UserRepository();
        $user = $userRepository->find(9);

        $employee = $employeeRepository->findByUser($user);
        dd($employee);

        include '../templates/index.php';
        ob_end_flush();
    }

    public static function loginController()
    {
        ob_start();
        include '../templates/login.php';
        ob_end_flush();
    }

    public static function signupController()
    {
        ob_start();
        include '../templates/signup.php';
        ob_end_flush();
    }

    public static function registrationController()
    {
        session_start();
        if (!empty($_POST)){
            $signup = new RegisterForm($_POST);
            $signup->register();
        }
        header('Location:/');
    }

    public static function verificationController()
    {
        session_start();
        if (!empty($_POST)){
            $signin = new LoginForm($_POST);
            $signin->authentification();
        }
        header('Location:/');
    }

    public static function error404Controller()
    {
        ob_start();
        include '../templates/404.php';
        ob_end_flush();
    }
    public static function customersController()
    {
        ob_start();
        include '../templates/customers.php';
        ob_end_flush();
    }

}