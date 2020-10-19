<?php

namespace App\Entity;

class Employee
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $role;
    private int $salary;
    private string $contract;
    private $hired;
    private $dismissed;
}