<?php

namespace App\Repository;

use App\Entity\Employee;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("User");
    }

<<<<<<< HEAD
    public function findByEmployee(Employee $employee)
    {
        $idEmployee = $employee->getId();
        $query = $this->pdo->prepare("SELECT employee.* FROM employee JOIN user ON user.id = employee.user_id WHERE employee.user_id = ?");
        $query->execute([$idEmployee]);
        return $query->fetch();
    }

    public function findAllUser()
    {
        $query = $this->pdo->prepare("SELECT employee.* FROM employee");
        $query->execute();
        return $query->fetchAll();
    }
    
=======
    /*public function findByEmployee(Employee $employee)
    {

    }*/
>>>>>>> 94c14782a589f3bf9499944423aae7c0ed953357
}