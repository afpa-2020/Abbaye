<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Repository\ContactRepository;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;

abstract class Controller
{
    public static function homeController()
    {
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $projectRepository = new ProjectRepository();
        $customerRepository = new CustomerRepository();
        $contactRepository = new ContactRepository();

        $projet = $projectRepository->find(1);
        $employee = $employeeRepository->find(214);
        $projects = $projectRepository->findByEmployee($employee);
        
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
}