<?php

namespace App\Repository;

use App\Config\DbConfig;
use \PDO;

abstract class Repository {
    protected PDO $pdo;
    private string $table;
    private string $classname;

    public function __construct(string $classname)
    {
        $this->pdo = new PDO (DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);
        $this->classname = $classname;
        $this->table = strtolower($classname);
    }

    public function find(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $query->execute([$id]);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
        return $query->fetch();
    }

    public function findAll()
    {
        $query = $this->pdo->query("SELECT * FROM $this->table");
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $params = array_values($criteria);
        $criteria = " WHERE " . join(" AND ", array_map(fn($key) => "$key = ?", array_keys($criteria)));
        if ($orderBy) $orderBy = " ORDER BY " . join(", ", array_map(fn($key, $value) => "$key $value", array_keys($orderBy), array_values($orderBy)));
        $query = $this->pdo->prepare("SELECT * FROM $this->table $criteria $orderBy");
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
        return $query->fetch();
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
    {
        $params = array_values($criteria);
        if (!empty($criteria)) {
            $criteria = " WHERE " . join(" AND ", array_map(fn($key) => "$key = ?", array_keys($criteria)));
        } else {
            $criteria = null;
        }
        if ($orderBy) $orderBy = " ORDER BY " . join(", ", array_map(fn($key, $value) => "$key $value", array_keys($orderBy), array_values($orderBy)));
        if ($limit) $limit = " LIMIT $limit";
        if ($offset) $offset = " OFFSET $offset";
        $sql = "SELECT * FROM $this->table $criteria $orderBy $limit $offset";
        $query = $this->pdo->prepare($sql);
        $query->execute($params);
        //dd($sql);
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
    }
    
    /**
     * paginate: permet l'affichage avec pagination d'un tableau contenant toutes les entrées d'une table
     * l'argument d'entrée est le nom de la colonne qui sera triée par ordre alphabétique
     * @param  mixed $column
     * @return [$nbPerPage, $first, $currentPage, $pages] les variables de ce tableau pourront être utilisées dans le Controller afin de permettre
     * un affichage correct de la pagination
     */
    public function paginate($column) {
        if(isset($_GET['page']) && !empty($_GET['page'])){
            $currentPage = (int) strip_tags($_GET['page']);
          }else{
            $currentPage = 1;
          }

          if(isset($_GET['search']) && !empty($_GET['search'])){
            $search = "WHERE $column LIKE '{$_GET['search']}%'";
          }else{
            $search = null;
          }

        $sql = "SELECT COUNT(*) AS nb_rows FROM $this->table $search";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        
        $nbRows = $result['nb_rows'];
        $nbPerPage = 10;
        $pages = ceil($nbRows/$nbPerPage);
        $first = ($currentPage * $nbPerPage) - $nbPerPage;
        if ($first<1) {
            $first = null;
        }
        return [$nbPerPage, $first, $currentPage, $pages];
    }
/**
 * searching: permet d'effectuer des recherches à l'intérieur d'une table affichée
 * 
 *
 * @param  mixed $search
 * @param  mixed $orderBy
 * @param  mixed $limit
 * @param  mixed $offset
 * @param  mixed $column
 * @return void
 */
public function searching(string $search, array $orderBy = null, int $limit = null, int $offset = null, string $column)
    {
        if ($orderBy) $orderBy = " ORDER BY " . join(", ", array_map(fn($key, $value) => "$key $value", array_keys($orderBy), array_values($orderBy)));
        if ($limit) $limit = " LIMIT $limit";
        if ($offset) $offset = " OFFSET $offset";
        $sql = "SELECT * FROM $this->table WHERE $column LIKE '{$search}%' $orderBy $limit $offset";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS, "App\Entity\\$this->classname");
    }
}
