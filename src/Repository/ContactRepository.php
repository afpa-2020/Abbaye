<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Contact;
use App\Entity\Document;
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
<<<<<<< HEAD
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Entity\Contact");
=======
        return $query->fetchAll(\PDO::FETCH_CLASS, "App\Entity\Contact");
>>>>>>> fcafe27da895b57734bd5885045fabcb925fbad4
    }

    public function findByDocument(Document $document)
    {
        $idDocument = $document->getId();
        $query = $this->pdo->prepare("SELECT contact .* FROM contact JOIN document ON contact.id = document.contact_id WHERE document.id = ?");
        $query->execute([$idDocument]);
        $query->setFetchMode(\PDO::FETCH_CLASS,"App\Entity\Contact");
        return $query->fetch();
    
    }

}