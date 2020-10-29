<?php


namespace App\Entity;

use App\Traits\JsonTrait;

class Customer
{
    use JsonTrait; 

    private int $id;
    private string $company_name;
    private string $address;
    private string $zip;
    private string $city;
    private int $turnover;
    private string $phone;
    private string $type;
    private string $nature;
    private string $comment;
    private string $activity;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCompanyName()
    {
        return $this->company_name;
    }

    public function setCompanyName($company_name)
    {
        $this->company_name = $company_name;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->adress = $address;
        return $this;
    }

    public function getZip()
    {
        return $this->zip;
    }

    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function getTurnover()
    {
        return $this->turnover;
    }

    public function setTurnover($turnover)
    {
        $this->turnover = $turnover;
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

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function getNature()
    {
        return $this->nature;
    }

    public function setNature($nature)
    {
        $this->nature = $nature;
        return $this;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    public function getActivity()
    {
        return $this->activity;
    }

    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }
}
