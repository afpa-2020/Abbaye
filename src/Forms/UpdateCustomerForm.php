<?php


namespace App\Forms;

use App\Config\DbConfig;

/**
 * On utilise une classe pour pouvoir faire une vérification de formulaire en  PHP
 */
class UpdateCustomerForm
{
    private string $company_name;
    private string $address;
    private string $zip;
    private string $city;
    private int $income;
    private int $workforce;
    private string $phone;
    private string $type;
    private string $nature;
    private string $comment;
    private string $activity;
    private int $id;
    


    /**
     * On crée un constructeur dans lequelle on va passer la méthode POST et on va récuperer les informations que l'on na besoin 
     */
    public function __construct($post)
    {
        $this->company_name = htmlspecialchars($post['companyName']);
        $this->address = htmlspecialchars($post['address']);
        $this->zip = (string) htmlspecialchars(trim($post['zip']));
        $this->city = htmlspecialchars($post['city']);
        $this->income = (int) $post['turnover'];
        $this->workforce = (int) $post['workforce'];
        $this->phone = (string) htmlspecialchars(trim($post['phone']));
        $this->type = htmlspecialchars(trim($post['type']));
        $this->nature = htmlspecialchars(trim($post['nature']));
        $this->comment = $post['comment'];
        $this->activity = htmlspecialchars($post['activity']);
        $this->id = (int)$post['id'];
    }

    public function updateCustomer()
    {
        if (
            !preg_match('/^[a-zA-Z0-9À-ÿ.\'\,_\s-][a-zA-Z0-9À-ÿ. \'\,_\s-]{0,40}[a-zA-Z0-9À-ÿ.\'_\s-]$/', $this->company_name) ||
            $this->address === "" ||
            !preg_match('/^[0-9]{5}$/', $this->zip) ||
            $this->city === "" ||
            $this->income === "" ||
            !preg_match('/^(([0-9]{2} ){4}[0-9]{2})$|^[0-9]{10}$/', $this->phone)||
            !preg_match('/(Publique|Privée)/', $this->type) ||
            !preg_match('/(^Principale|Secondaire|Ancienne)$/', $this->nature) ||
            $this->activity === ""
        ) {
            return "Client non-conforme.";

        } else {

            $pdo = new \PDO(DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

            $param = get_object_vars($this);
            unset($param['id']);
            $param = join(", ", array_map(fn($key, $value) => "$key = '$value'", array_keys($param), array_values($param)));
            $sql = "UPDATE customer SET $param WHERE id = $this->id";
            $query = $pdo->prepare($sql);
            return $query->execute([$param]);
        }
    }
}
