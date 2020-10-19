<?php
require_once '../src/Repository/Repository.php';

class ProjectRepository extends Repository {

    public function __construct()
    {
        parent::__construct("Project");
    }

}