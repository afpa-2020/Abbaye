
<?php

namespace App\Forms;
 
use App\Repository\UserRepository;


class LoginForm {
    
    private string $identifiant;
    private string $password;


    public function __construct($post)
    {
        $this->identifiant = htmlspecialchars($post['identifiant']);
        $this->password = trim($post["password"]);
    }

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