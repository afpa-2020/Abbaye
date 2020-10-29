<?php

namespace App\Forms;
 
use App\Repository\UserRepository;


class LoginForm {
    
    private string $identifiant;
    private string $password;

/**
 * On créer un constructeur dans lequelle on passe la méthode POST 
 * Récuperer les informations dont l'on na besoins 
 */
    public function __construct($post)
    {
        $this->identifiant = htmlspecialchars($post['identifiant']);
        $this->password = trim($post["password"]);
    }

        
    /**
     *Assure la connexion d'un utilisateur en vérifiant sa présence dans la base de données
     *et la concordance avec le mot de passe saisi.
     * @return void
     */
    public function authentification(){
       
        $UserRep = new UserRepository();
        $result = $UserRep->authentificate($this->identifiant);
        if(empty($result)) {
            echo("connection invalide");
        } else {
            if(password_verify($this->password, $result["password"])){
                $_SESSION['login'] = $result['login'];
                $_SESSION['role'] = $result['role'];
                echo "ok";
            } else {
                echo("connection invalide");
            }
        }
    }
}