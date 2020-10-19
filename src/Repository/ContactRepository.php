<?php
require_once '../src/Repository/Repository.php';

class ContactRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Contact");
    }
}