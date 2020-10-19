<?php

namespace App\Repository;

use App\Entity\Customer;
use App\Entity\Project;
use App\Entity\Contact;
use \PDO;


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
    public function findByProject(Project $project)
    {
        $idProject = $project->getId();
        $query = $this->pdo->prepare("SELECT customer.* FROM customer JOIN project ON customer.id = project.customer_id   WHERE project.id = ? ");
        $query->execute([$idProject]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Customer');
        return $query->fetch();
    }
    
    public function findByContact(Contact $contact)
    {
        $idContact = $contact->getId();
        $query = $this->pdo->prepare('SELECT customer.* FROM customer JOIN contact ON customer.id = contact.customer_id WHERE contact.id = ?');
        $query->execute([$idContact]);
        $query->setFetchMode(PDO::FETCH_CLASS, 'App\Entity\Customer');
        return $query->fetch();
    }
}