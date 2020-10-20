<?php

namespace App\Forms;

class RegisterForm
{

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
    //A L'ATTENTION DE LEA, LA SEULE FILLE DU GROUPE !!!!
    //On vérifie qu'on a toutes les infos et qu'elles sont correctes (mdp === confirmation mdp)
    //Au passage, on applique des fonctions de sécurité (trim, htmlspecialchars, filter etc)

    //on HASH le mod de passe !!!!!!

    //Si tout est ok, on enregistre notre nouvel utilisateur dans la base de données :)

    //En cas de problème ---> on ramène l'utilisateur sur le formulaire
    //Si tout est ok ---> on le remercie pour osn inscription (header('/merci')) puis on le ramène sur index
    //... en créant sa session :D
  }
}
