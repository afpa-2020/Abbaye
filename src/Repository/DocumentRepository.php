<?php

namespace App\Repository;

use App\Entity\Contact;
use DateTime;
use App\Entity\Document;

class DocumentRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Document");
    }
    
    /**
     *Retourne un Document écrit par un Contact passé en argument.
     * @param Contact $contact
     * @return Document
     */
    public function findByContact(Contact $contact) : Document
    {
        $idContact = $contact->getId();
        $query = $this->pdo->prepare("SELECT * FROM document JOIN contact ON document.contact_id = contact.id WHERE contact.id = ?");
        $query->execute([$idContact]);
        return $query->fetch();
    }
    
    /**
     *Retourne un tableau de Document selon un nom de famille de Contact (auteur) passé en argument.
     * @param string $name
     * @return Document[]
     */
    public function findByContactLastname(string $name) : array
    {
       $query = $this->pdo->prepare("SELECT * FROM contact WHERE contact.lastname = ?");
       $query->execute([$name]);
       return $query->fetchAll();
    }
}