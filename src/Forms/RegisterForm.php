<?php

namespace App\Forms;

class RegisterForm
{
  //propri

  private string $identifiant;
  private string $email;
  private string $password;
  private string $confirmPassword;


  //constr ($post)
  public function __construct($post)
  {
    $this->identifiant = $post['identifiant'];
    $this->email = $post['email'];
    $this->password = $post['password'];
    $this->confirmPassword = $post['confirmPassword'];
  }

  public function register()
  {
    
  }
}
