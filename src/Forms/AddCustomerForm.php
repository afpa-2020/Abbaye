<?php


namespace App\Forms;

use App\Config\DbConfig;

/**
 * On utilise une classe pour pouvoir faire une vérification de formulaire en  PHP
 */
class AddCustomerForm
{
    private string $company_name;
    private string $address;
    private string $zip;
    private string $city;
    private int $turnover;
    private int $workforce;
    private string $phone;
    private string $type;
    private string $nature;
    private string $comment;
    private string $activity;
    


    /**
     * On crée un constructeur dans lequelle on va passer la méthode POST et on va récuperer les informations que l'on na besoin 
     */
    public function __construct($post)
    {
        $this->company_name = htmlspecialchars($post['companyName']);
        $this->address = htmlspecialchars($post['address']);
        $this->zip = (string) htmlspecialchars($post['zip']);
        $this->city = htmlspecialchars($post['city']);
        $this->turnover = (int) $post['turnover'];
        $this->workforce = (int) $post['workforce'];
        $this->phone = (string) htmlspecialchars(trim($post['phone']));
        $this->type = htmlspecialchars($post['type']);
        $this->nature = htmlspecialchars($post['nature']);
        $this->comment = "";
        $this->activity = htmlspecialchars($post['activity']);
    }

    public function addToDatabase()
    {
        if (
            !preg_match('/^[a-zA-Z0-9À-ÿ.\'\,_\s-][a-zA-Z0-9À-ÿ. \'\,_\s-]{0,40}[a-zA-Z0-9À-ÿ.\'_\s-]$/', $this->company_name) ||
            $this->address === "" ||
            !preg_match('/^[0-9]{5}$/', $this->zip) ||
            $this->city === "" ||
            $this->turnover === "" ||
            !preg_match('/^(([0-9]{2} ){4}[0-9]{2})$|^[0-9]{10}$/', $this->phone)||
            !preg_match('/(Publique|Privée)/', $this->type) ||
            !preg_match('/(Principale|Secondaire|Ancienne)/', $this->nature) ||
            $this->activity === ""
        ) {
            return "Client non-conforme.";

        } else {
            $pdo = new \PDO(DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

            $sql = "SELECT COUNT(*) AS Nb_results FROM customer WHERE company_name = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->company_name]);
            $result = $stmt->fetch();

            if ($result['Nb_results'] > 0){

                return "Ce client existe déjà.";

            } else {
                $sql = "INSERT INTO customer 
                (company_name, address, zip, city, income, workforce, phone, type, nature, comment, activity) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                return $stmt->execute(array_values(get_object_vars($this)));
            }
        }
    }
}
