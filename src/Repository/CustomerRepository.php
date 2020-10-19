<?php
require_once '../src/Repository/Repository.php';

class CustomerRepository extends Repository 
{
    public function __construct()
    {
        parent::__construct("Customer");
    }

    public function findAllContact(int $id)
    {
        $idContact = 1;
        $query = $this->pdo->prepare(" ");
        $query->execute([1]);
        return $query->fetchAll();
    }
}