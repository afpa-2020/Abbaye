<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Repository\ContactRepository;
use App\Repository\CustomerRepository;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;

class Controller
{
    public function homeController()
    {
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $projectRepository = new ProjectRepository();
        $customerRepository = new CustomerRepository();
        $contactRepository = new ContactRepository();

        $projet = $projectRepository->find(1);
        $employee = $employeeRepository->find(214);
        $customer = $customerRepository->find(5);
        $contact = $contactRepository->find(1);

        //$projects = $projectRepository->findByEmployee($employee);
        //$contacts = $contactRepository->findAllContact($customer);
        //$customers = $customerRepository->findByContact($contact);
        //$customers = $customerRepository->findByProject($projet);

        dd($customers);
        include '../templates/index.php';
        ob_end_flush();
    }

    public function loginController()
    {
        ob_start();
        include '../templates/login.php';
        ob_end_flush();
    }

    public function signupController()
    {
        ob_start();
        include '../templates/signup.php';
        ob_end_flush();
    }

    public function error404Controller()
    {
        ob_start();
        include '../templates/404.php';
        ob_end_flush();
    }
}