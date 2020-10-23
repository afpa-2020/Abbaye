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
        session_start();
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
            echo $signup->register();
        }
    }

    public static function error404Controller()
    {
        session_start();
        ob_start();
        include '../templates/404.php';
        ob_end_flush();
    }

    public static function customersController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/error404');
        } 
        ob_start();
        $customerRepository = new CustomerRepository();
        $customers = $customerRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/customers.php';
        ob_end_flush();
    }

    public static function projectsController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/error404');
        } 
        ob_start();
        $projectRepository = new ProjectRepository();
        $projects = $projectRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/projects.php';
        ob_end_flush();
    }

    public static function contactsController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/error404');
        } 
        ob_start();
        $contactRepository = new ContactRepository();
        $contacts = $contactRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/contacts.php';
        ob_end_flush();
    }

    public static function employeesController()
    {
        session_start();
        if(!isset($_SESSION['login'])) {
            header('Location:/error404');
        } 
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $employees = $employeeRepository->findBy([],["id"=>"ASC"],10);
        include '../templates/employees.php';
        ob_end_flush();
    }

    public static function disconnectController(){
        session_start();
        session_destroy();
        header("location:/");
    }

    

    public static function shapeController()
    {
        ob_start();
        include '../templates/shape.php';
        ob_end_flush();
    }

    public static function selectcustomerController(){
        $customerRepository = new CustomerRepository();
        $data = file_get_contents("php://input");
        $data = json_decode($data);
        $customer = $customerRepository->find($data->id);

        /*Version jQuery
        $data = $_POST;
        $customer = $customerRepository->find($data['id']);*/
        
        echo $customer->toJson();
    }
}