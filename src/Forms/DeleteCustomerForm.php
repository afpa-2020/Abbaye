<?php


namespace App\Forms;

use App\Config\DbConfig;

/**
 * On utilise une classe pour pouvoir faire une vérification de formulaire en  PHP
 */
class DeleteCustomerForm
{
    private int $id;
    
    /**
     * On crée un constructeur dans lequelle on va passer la méthode POST et on va récuperer les informations que l'on na besoin 
     */
    public function __construct($post)
    {
        $this->id = (int)$post['id'];
    }

    public function deleteCustomer()
    {
        $pdo = new \PDO (DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

        $sql = "DELETE FROM customer WHERE id = $this->id";
        $query = $pdo->prepare($sql);
        $query->execute();
        dd($query);
    }
}
