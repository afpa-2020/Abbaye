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
        $query->setFetchMode(PDO::FETCH_CLASS, $this->classname);
        return $query->fetch();
    }

    public function findAll()
    {
        $query = $this->pdo->query("SELECT * FROM $this->table");
        return $query->fetchAll(PDO::FETCH_CLASS, $this->classname);
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        $params = array_values($criteria);
        $criteria = " WHERE " . join(" AND ", array_map(fn($key) => "$key = ?", array_keys($criteria)));
        if ($orderBy) $orderBy = " ORDER BY " . join(", ", array_map(fn($key, $value) => "$key $value", array_keys($orderBy), array_values($orderBy)));
        $query = $this->pdo->prepare("SELECT * FROM $this->table $criteria $orderBy");
        $query->execute($params);
        $query->setFetchMode(PDO::FETCH_CLASS, $this->classname);
        return $query->fetch();
    }

    public function findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
    {
        $params = array_values($criteria);
        if (!empty($citeria)) {
            $criteria = " WHERE " . join(" AND ", array_map(fn($key) => "$key = ?", array_keys($criteria)));
        } else {
            $criteria = null;
        }
        if ($orderBy) $orderBy = " ORDER BY " . join(", ", array_map(fn($key, $value) => "$key $value", array_keys($orderBy), array_values($orderBy)));
        if ($limit) $limit = " LIMIT $limit";
        if ($offset) $offset = " OFFSET $offset";
        $query = $this->pdo->prepare("SELECT * FROM $this->table $criteria $orderBy $limit $offset");
        $query->execute($params);
        return $query->fetchAll(PDO::FETCH_CLASS, $this->classname);
    }
}