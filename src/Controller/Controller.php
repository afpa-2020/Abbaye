<?php

namespace App\Controller;

use App\Entity\Employee;
use App\Entity\Project;
use App\Repository\EmployeeRepository;
use App\Repository\ProjectRepository;

class Controller
{
    public function homeController()
    {
        ob_start();
        $employeeRepository = new EmployeeRepository();
        $projectRepository = new ProjectRepository();

        $projet = $projectRepository->find(1);
        $employee = $employeeRepository->find(214);

        $projects = $projectRepository->findByEmployee($employee);

        dd($employee);
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