<?php

namespace App\Forms;

class RegisterForm {
    //propri

    private int $identifiant;
    private string $email;
    private string $password ;
    private string $confirmPassword;
    

    //constr ($post)
    public function __construct($post)
    {
      if(!empty($post))
      {
          $this->identifiant = $post['identifiant'];
          $this->email = $post['email'];
          $this->password = $post['password'];
          $this->confirmPassword = $post['confirmPassword'];
          
      }
    }



    //public function registration();
}