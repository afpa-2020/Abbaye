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

abstract class Controller
{
    public static function homeController()
    {
        ob_start();
        $customerRepository = new CustomerRepository();
        $documentRepository = new DocumentRepository();
        $doc = $documentRepository->find(1);

        $customer = $customerRepository->findByDocument($doc);
        dd($customer);

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

    public static function registrationController()
    {
        session_start();

        $newRegistration = new RegisterForm($_POST);

        header("Location:/");
    }
}