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
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
        return $this;
    }

    public function getContract()
    {
        return $this->contract;
    }

    public function setContract($contract)
    {
        $this->contract = $contract;
        return $this;
    }

    public function getHired()
    {
        return $this->hired;
    }

    public function setHired($hired)
    {
        $this->hired = $hired;
        return $this;
    }

    public function getDismissed()
    {
        return $this->dismissed;
    }

    public function setDismissed($dismissed)
    {
        $this->dismissed = $dismissed;
        return $this;
    }
}