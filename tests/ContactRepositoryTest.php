<?php

use PHPUnit\Framework\TestCase;
use App\Repository\ContactRepository;
use App\Repository\DocumentRepository;
use App\Entity\Contact;
use App\Repository\CustomerRepository;

class ContactRepositoryTest extends TestCase
{

    public function testfindByDocument()
    {
        $contactRepository = new ContactRepository();

        $documentRepository = new DocumentRepository();
        $document = $documentRepository->find(1);

        $resultat = $contactRepository->findByDocument($document);
        $this->assertInstanceOf(Contact::class, $resultat);
    }


    public function testfindSampleByCustomer()
    {
        $contactRepository = new ContactRepository();

        $customerRepository = new CustomerRepository();
        $customer = $customerRepository->find(1);

        $resultats = $contactRepository->findSampleByCustomer($customer);
        $this->assertInstanceOf(Contact::class,  $resultats[0]);
        $this->assertLessThanOrEqual(3, count($resultats));
      
    } 
}
