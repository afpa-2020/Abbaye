<?php
require_once '../src/Repository/Repository.php';

class EmployeeRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Employee");
    }

}