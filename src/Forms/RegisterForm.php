<?php


namespace App\Forms;

use App\Config\DbConfig;

/**
 * On utilise une classe pour pouvoir faire une vérification de formulaire en  PHP
 */
class RegisterForm
{

  private string $identifiant;
  private string $email;
  private string $password;
  private string $confirmPassword;


 /**
  * On crée un constructeur dans lequelle on va passer la méthode POST et on va récuperer les informations que l'on na besoin 
  */
  public function __construct($post)
  {
      $this->identifiant = htmlspecialchars(trim($post['identifiant']));
      $this->email = htmlspecialchars(strtolower(trim($post['email'])));
      $this->password = trim($post['password']);
      $this->confirmPassword = trim($post['confirmPassword']); 
  }

  /**
   * On créer une fonction register qui va nous permettre de rentrer un nouveau utilisateur dans la base de données 
   * On crée une  requête SQL qui va verifier si l'utilisateur un déja ce nom pris 
   * On crée une requête SQL qui va vérifier si c'est email est déja dans la base de données 
   * On crée une requête SQL qui nous permet d'ajouter un nouvel utilisateur
   */
  public function register()
  {
    if ($this->identifiant === "") return "Identifiant invalide.";
    if ($this->email !== filter_var($this->email)) return "Email invalide.";
    if ($this->password !== $this->confirmPassword) {
      return "Le mot de passe et sa confirmation sont différents !";
    } else {
      $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }
  
    $pdo = new \PDO (DbConfig::DSN, DbConfig::USERNAME, DbConfig::PASSWORD);

   

    $query = $pdo->prepare("SELECT user.* FROM user WHERE email = ?");
    $query->execute([$this->email]);
    $results = $query->fetchAll(\PDO::FETCH_ASSOC);
    if (!empty($results)) return "Email déjà utilisée.";      

    $query = $pdo->prepare("SELECT user.* FROM user WHERE login = ?");
    $query->execute([$this->identifiant]);
    $results = $query->fetchAll(\PDO::FETCH_ASSOC);
    if (!empty($results)) return "Identifiant déjà pris.";      

    
    $query = $pdo->prepare("INSERT INTO user (login,password,email, role) VALUES (?,?,?,?)");
    $query->execute([$this->identifiant, $this->password, $this->email, "Visiteur"]);
  
    $_SESSION['login'] = $this->identifiant;
    $_SESSION['role'] = "Visiteur";
    return "true";
   
  
  }
}