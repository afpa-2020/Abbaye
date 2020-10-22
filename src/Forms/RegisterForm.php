<?php

namespace App\Forms;

use App\Config\DbConfig;

class RegisterForm
{

  private string $identifiant;
  private string $email;
  private string $password;
  private string $confirmPassword;


  //constr ($post)
  public function __construct($post)
  {
      $this->identifiant = htmlspecialchars(trim($post['identifiant']));
      $this->email = htmlspecialchars(strtolower(trim($post['email'])));
      $this->password = trim($post['password']);
      $this->confirmPassword = trim($post['confirmPassword']); 
  }

  public function register()
  {
    if ($this->email !== filter_var($this->email)) return "Email invalide.";
    if ($this->password !== $this->confirmPassword) {
      return "Le mot de passe et sa confirmation sont différents !";
    } else {
      $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
  
    $pdo = new \PDO (DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

    //Est-ce que cet email existe déjà ?
    //Oui il existe ---> return false (PAS BIEN)

    $query = $pdo->prepare("SELECT user.* FROM user WHERE email = ?");
    $query->execute([$this->email]);
    $results = $query->fetchAll(\PDO::FETCH_ASSOC);
    if (!empty($results)) return "Email déjà utilisée.";      

    $query = $pdo->prepare("SELECT user.* FROM user WHERE login = ?");
    $query->execute([$this->identifiant]);
    $results = $query->fetchAll(\PDO::FETCH_ASSOC);
    if (!empty($results)) return "Identifiant déjà pris.";      

    //Non c'est bon, ce mail existe pas déjà, on peut ajouter notre utilisateur :
    $query = $pdo->prepare("INSERT INTO user (login,password,email, role) VALUES (?,?,?,?)");
    $query->execute([$this->identifiant, $this->password, $this->email, "Visiteur"]);
  
    $_SESSION['login'] = $this->identifiant;
    $_SESSION['role'] = "Visiteur";
    return "true";
   
  
  }
}