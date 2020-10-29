<?php
/**
 * @author Maxime
 * Last modification : 29/10/2020
 */
namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Project;
use App\Entity\Contact;
use App\Entity\Document;
use App\Repository\ContactRepository;
use \PDO;


class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }
    
    /**
     * Permet de trouver un Client à partir du Projet auquel il est assigné.
     * @param Project $project
     * @return Customer
     */
    public function findByProject(Project $project) : Customer
    {
        $idProject = $project->getId();
        $query = $this->pdo->prepare("SELECT customer.* FROM customer JOIN project ON customer.id = project.customer_id   WHERE project.id = ? ");
        $query->execute([$idProject]);
        $query->setFetchMode(PDO::FETCH_CLASS, Customer::class);
        return $query->fetch();
    }
        
    /**
     * Permet de trouver le Client pour lequel travaille un Contact.
     * @param Contact $contact
     * @return Customer
     */
    public function findByContact(Contact $contact) : Customer
    {
        $idContact = $contact->getId();
        $query = $this->pdo->prepare('SELECT customer.* FROM customer JOIN contact ON customer.id = contact.customer_id WHERE contact.id = ?');
        $query->execute([$idContact]);
        $query->setFetchMode(PDO::FETCH_CLASS, Customer::class);
        return $query->fetch();
    }

        
    /**
     * Permet de trouver un Client à partir d'un Document.
     * @param Document $document
     * @return Customer
     */
    public function findByDocument(Document $document) : Customer
    {
        $contactRepository = new ContactRepository();
        $contact = $contactRepository->findByDocument($document);

        return $this->findByContact($contact);
    }
}