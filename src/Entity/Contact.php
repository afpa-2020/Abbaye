<?php

namespace App\Entity;

class Contact
{
    private int $id;
    private string $role;
    private string $lastname;
    private string $firstname;
    private string $phone;
    private string $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
        return $this;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getLastname()
    {
        return $this->lastname;
        return $this;
    }

    public function setLastname($lastname)
    {
       $this->lastname = $lastname;
    }

    public function getFirstname()
    {
        return $this->firstname;
        return $this;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    public function toJson(){
        return json_encode(get_object_vars($this));
    }
}
