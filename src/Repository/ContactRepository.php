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
/**
 * Cette fonction permet de trouver un client
 * @return array Contact
 */
    public function findAllByCustomer(Customer $customer)
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ?");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }
/**
 * Cette fonction permet de trouver un document
 * @return Contact
 */
    public function findByDocument(Document $document)
    {
        $idDocument = $document->getId();
        $query = $this->pdo->prepare("SELECT contact .* FROM contact JOIN document ON contact.id = document.contact_id WHERE document.id = ?");
        $query->execute([$idDocument]);
        $query->setFetchMode(\PDO::FETCH_CLASS,Contact::class);
        return $query->fetch();
    
    }

    public function findSampleByCustomer(Customer $customer)
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ? LIMIT 3");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }

}