<?php

namespace App\Repository;

class EmployeeRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Employee");
    }

}