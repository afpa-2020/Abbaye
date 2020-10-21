<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Entity\Customer;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;
use App\Repository\DocumentRepository;
use App\Forms\RegisterForm;
use App\Forms\LoginForm;
use App\Repository\ContactRepository;
use App\Repository\UserRepository;

abstract class Controller
{
    public static function homeController()
    {
        ob_start();
        include '../templates/index.php';
        ob_end_flush();
    }

    public static function loginController()
    {
        session_start();
        if (!empty($_POST)){
            $signin = new LoginForm($_POST);
            $signin->authentification();
        }
        header('Location:/');
    }

    public static function signupController() //Formulaire d'enregistrement
    {
        ob_start();
        include '../templates/signup.php';
        ob_end_flush();
    }

    public static function registrationController() // Vérification des données
    {
        session_start();
        if (!empty($_POST)){
            $signup = new RegisterForm($_POST);
            $signup->register();
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
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/customers.php';
        ob_end_flush();
    }

    public static function projectsController()
    {
        ob_start();
        $projectRepository = new ProjectRepository();
        $projects = $projectRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/projects.php';
        ob_end_flush();
    }

    public static function contactsController()
    {
        ob_start();
        $contactRepository = new ContactRepository();
        $contacts = $contactRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/contacts.php';
        ob_end_flush();
    }

    public static function employeesController()
    {
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $employees = $employeeRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/employees.php';
        ob_end_flush();
    }

}