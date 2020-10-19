<?php

namespace App\Repository;

use App\Entity\Contact;
use DateTime;

class DocumentRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Document");
    }

    public function findByContact(Contact $contact)
    {
        $idContact = $contact->getId();
        $query = $this->pdo->prepare("SELECT * FROM document JOIN contact ON document.contact_id = contact.id WHERE contact.id = ?");
        $query->execute([$idContact]);
        $query->fetch();
    }

    public function findByLastname(string $name)
    {
       $query = $this->pdo->prepare("SELECT * FROM contact WHERE contact.lastname = ?");
       $query->execute([$name]);
       return $query->fetchAll();
    }
}