<?php

namespace App\Repository;

class ContactRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Contact");
    }
}