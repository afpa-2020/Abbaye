<?php

namespace App\Repository;

use App\Entity\Employee;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("User");
    }

    /**
     * function findByEmployees
     * @param {Employee} $employee
     * @return user.id
     */
    public function findByEmployee(Employee $employee)
    {
        $idEmployee = $employee->getId();
        $query = $this->pdo->prepare("SELECT employee.* FROM employee JOIN user ON user.id = employee.user_id WHERE employee.user_id = ?");
        $query->execute([$idEmployee]);
        return $query->fetch();
    }

    /**
     * function authentificate
     * @param  $login
     * @param  $password
     * @return user.id
     */
    public function authentificate(string $login)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE user.login = ?");
        $query->execute([$login]);
        return $query->fetch();
    }
}