<?php

namespace App\Repository;

use App\Entity\Contact;

class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }

    public function findAllContact(Contact $contact)
    {
        $idContact = $contact->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE contact.id = ?");
        $query->execute([$idContact]);
        return $query->fetchAll();
    }
}