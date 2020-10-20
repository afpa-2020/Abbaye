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
<<<<<<< HEAD
        $contactRepository = new ContactRepository();
        
        $customer = $customerRepository->find(1);

        $project = $projectRepository->findAllByCustomer($customer);

        dump($project);
=======
        $documentRepository = new DocumentRepository();
        $doc = $documentRepository->find(1);

        $customer = $customerRepository->findByDocument($doc);
        dd($customer);
>>>>>>> fcafe27da895b57734bd5885045fabcb925fbad4

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