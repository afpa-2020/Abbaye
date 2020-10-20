<?php

namespace App\Repository;

use App\Entity\Project;


class EmployeeRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Employee");
    }

    public function findByProject(Project $project)
    {
        $idProject = $project->getId();
        $query = $this->pdo->prepare("SELECT employee .* FROM employee JOIN project_employee AS pe ON pe.employee_id = employee.id WHERE pe .project_id = ?");
        $query->execute([$idProject]);
        return $query->fetchAll(\PDO::FETCH_CLASS, 'App\Entity\Employee');
    }

    /*public function findByUser(User $user)
    {

    }
    */

}