<?php
require_once '../src/Repository/Repository.php';

class UserRepository extends Repository
 {
    public function __construct()
    {
        parent::__construct("User");
    }
}