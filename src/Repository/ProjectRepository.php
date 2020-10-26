<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Entity\Customer;

class ProjectRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Project");
    }

    public function findByEmployee(Employee $employee)
    {
        $idEmployee = $employee->getId();
        $query = $this->pdo->prepare("SELECT project .* FROM project JOIN project_employee AS pe ON  pe.project_id = project.id WHERE pe.employee_id = ?");
        $query->execute([$idEmployee]);
        return $query->fetchAll(\PDO::FETCH_CLASS , "App\Entity\Project");

    }

    public function findAllByCustomer(Customer $customer)
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT project.* FROM project JOIN customer ON customer.id = project.customer_id WHERE customer.id = ?");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS,'App\Entity\Project');
    }
    
}