<?php

namespace App\Repository;

use App\Entity\Customer;

class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }

    
}