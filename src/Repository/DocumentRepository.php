<?php

namespace App\Repository;

class DocumentRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Document");
    }

    /*findByContact (Contact $contact){

    }

    findByCustomer (Customer $customer){
        ATTENTION plsuieurs contacts --> plusieurs documents
        ->findByContact($customer);
    }
*/
}