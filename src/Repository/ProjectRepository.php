<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Entity\Customer;

class ProjectRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Project");
    }
/**
 * Cette fonction permet de trouver un employée
 * @return array projects
 */
    public function findByEmployee(Employee $employee)
    {
        $idEmployee = $employee->getId();
        $query = $this->pdo->prepare("SELECT project .* FROM project JOIN project_employee AS pe ON  pe.project_id = project.id WHERE pe.employee_id = ?");
        $query->execute([$idEmployee]);
        return $query->fetchAll(\PDO::FETCH_CLASS , Project::class);

    }
/**
 * Cette fonction qui permet de trouver un client
 * @return array projects
 */
    public function findAllByCustomer(Customer $customer)
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT project.* FROM project JOIN customer ON customer.id = project.customer_id WHERE customer.id = ?");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Project::class);
    }
    
}