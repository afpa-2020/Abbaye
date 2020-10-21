<?php

namespace App\Forms;
use App\Repository\UserRepository;

class LoginForm {
    
    private string $identifiant;
    private string $password;
    

    public function __construct($post)
    {
        $this->identifiant = htmlspecialchars($post['identifiant']);
        $this->password = hash("PASSWORD_BCRYPT",$post['password']); 
    }

    public function authentification(){
        //A L'ATTENTION D'ANTOINE LA MASCOTTE DE NOTRE FORMATION
        //On vérifie que les données soient conformes (pas d'injection !!!)
        //On les sécurisent avec des filtres/fonctions php
        $UserRep = new UserRepository();
    
        //on regarde si ce duo pseudo/password existe dans notre Database

        //si oui --> welcome !
        //si non --> va te faire enculer sac à merde !!!!!
        $result = $UserRep->authentificate($this->identifiant, $this->password);
        return $result;
    }
}