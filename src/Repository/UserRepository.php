<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Entity\User;

class UserRepository extends Repository
{
    public function __construct()
    {
        parent::__construct("User");
    }

        
    /**
     *
     * @param Employee $employee
     * @return User
     */
    public function findByEmployee(Employee $employee)
    {
        $idEmployee = $employee->getId();
        $query = $this->pdo->prepare("SELECT employee.* FROM employee JOIN user ON user.id = employee.user_id WHERE employee.user_id = ?");
        $query->execute([$idEmployee]);
        return $query->fetch();
    }

    
    public function authentificate(string $login)
    {
        $query = $this->pdo->prepare("SELECT * FROM user WHERE user.login = ?");
        $query->execute([$login]);
        $query->setFetchMode(\PDO::FETCH_ASSOC);
        return $query->fetch();
    }
}