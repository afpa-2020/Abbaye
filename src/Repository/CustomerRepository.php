<?php

namespace App\Repository;

use App\Entity\Customer;

class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }

    public function findAllContact(Customer $customer)
    {
        $idContact = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ?");
        $query->execute([$idContact]);
        return $query->fetchAll(\PDO::FETCH_CLASS,'App\Entity\Contact');
    }
}