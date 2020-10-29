<?php


namespace App\Forms;

use App\Config\DbConfig;

class DeleteCustomerForm
{
    private int $id;
    
    public function __construct($post)
    {
        $this->id = (int)$post['id'];
    }

        
    /**
     * Supprime le Customer selectionné.
     * Fonctionnalité d'édition réservée aux Users ayant les rôles "Commercial" et "RC".
     * @return void
     */
    public function deleteCustomer()
    {
        $pdo = new \PDO (DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

        $sql = "DELETE FROM customer WHERE id = $this->id";
        $query = $pdo->prepare($sql);
        $query->execute();
        dd($query);
    }
}
