<?php

use PHPUnit\Framework\TestCase;
use App\Repository\ProjectRepository;
use App\Repository\EmployeeRepository;
use App\Entity\Project;
use App\Repository\CustomerRepository;

class ProjectRepositoryTest extends Testcase {

    public function testFindByEmployee(){
        $projectRepository = new ProjectRepository();
        $employeeRepository = new EmployeeRepository();
        $employee = $employeeRepository->find(201);
        $resultats = $projectRepository->findByEmployee($employee);
        $this->assertInstanceOf(Project::class, $resultats[0]);
        $this->assertLessThanOrEqual(201, count($resultats));
    }

    public function testFindAllByCustomer(){
        $customerRepository = new CustomerRepository();
        $projectRepository = new ProjectRepository();
        $customer = $customerRepository->find(5);
        $resultat = $projectRepository->findAllByCustomer($customer);
        $this->assertInstanceOf(Project::class,$resultat[0]);
        $this->assertLessThanOrEqual(2, count($resultat));
    }
}