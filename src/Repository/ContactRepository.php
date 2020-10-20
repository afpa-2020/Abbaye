<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Contact;
use \PDO;

class ContactRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Contact");
    }

    public function findAllByCustomer(Customer $customer)
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ?");
        $query->execute([$idCustomer]);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
    }

    //FindByDocument WIP
    
}