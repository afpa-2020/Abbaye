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
     * Permet de retrouver tous les Contacts traivaillant pour un Client
     * @param Customer $customer
     * @return Contact[]
     */
    public function findAllByCustomer(Customer $customer) : array
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ?");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }
    
    /**
     *Permet de trouver le Contact auteur d'un Document passé en argument.
     * @param  Document $document
     * @return Contact
     */
    public function findByDocument(Document $document) : Contact
    {
        $idDocument = $document->getId();
        $query = $this->pdo->prepare("SELECT contact .* FROM contact JOIN document ON contact.id = document.contact_id WHERE document.id = ?");
        $query->execute([$idDocument]);
        $query->setFetchMode(\PDO::FETCH_CLASS,Contact::class);
        return $query->fetch();
    
    }
    
    /**
     *Permet de récupérer un tableau "échantillon" de 3 Contacts (maximum) travaillant pour un Client
     * @param Customer $customer
     * @return Contact[]
     */
    public function findSampleByCustomer(Customer $customer) : array
    {
        $idCustomer = $customer->getId();
        $query = $this->pdo->prepare("SELECT contact.* FROM contact JOIN customer ON customer.id = contact.customer_id WHERE customer.id = ? LIMIT 3");
        $query->execute([$idCustomer]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Contact::class);
    }

}