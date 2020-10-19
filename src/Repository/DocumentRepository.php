<?php
require_once '../src/Repository/Repository.php';

class DocumentRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Document");
    }

}