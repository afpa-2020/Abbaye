<?php

namespace App\Forms;

class LoginForm {
    
    private string $identifiant;
    private string $password;
    

    public function __construct($post)
    {
        $this->identifiant = $post['identifiant'];
        $this->password = $post['password']; 
    }

    public function authentification(){
        echo 'coucou';
    }

}