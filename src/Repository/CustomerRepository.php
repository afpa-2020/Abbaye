<?php
require_once '../src/Repository/Repository.php';

class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }

}