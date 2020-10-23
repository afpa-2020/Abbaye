<?php

namespace App\Entity;

class Project
{
    private int $id;
    private string $shortname;
    private string $fullname;
    private string $type;
    private $started;
    private string $customer_id;


    public function __construct()
    {
        $this->started = new \DateTime($this->started);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getShortname()
    {
        return $this->shortname;
    }

    public function setShortname($shortname)
    {
        $this->shortname = $shortname;
        return $this;
    }

    public function getFullname()
    {
        return $this->fullname;
    }

    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getStarted()
    {
        return $this->started;
    }

    public function setStarted($started)
    {
        $this->started = $started;
        return $this;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;
        return $this;
    }
    
    public function toJson(){
        return json_encode(get_object_vars($this));
    }
}