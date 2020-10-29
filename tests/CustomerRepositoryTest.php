<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Project;
use App\Repository\CustomerRepository;
use App\Repository\ProjectRepository;
use App\Repository\ContactRepository;

class CustomerRepositoryTest extends TestCase {

    public function testFindByProject() {
        $customerRepository = new CustomerRepository();
        $projectRepository = new ProjectRepository();

        $projectSample = $projectRepository->find(1);
        $this->assertEquals($projectSample->getId(), 1);

        $customer = $customerRepository->findByProject($projectSample);

        $this->assertInstanceOf('App\Entity\Customer', $customer);


    }

    public function testFindByContact() {
        $customerRepository = new CustomerRepository();
        $contactRepository = new ContactRepository();

        $contactSample = $contactRepository->find(1);
        $this->assertEquals($contactSample->getId(), 1);

        $customer = $customerRepository->findByContact($contactSample);
        $this->assertInstanceOf('App\Entity\Customer', $customer);
    }

}