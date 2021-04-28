<?php

namespace Controller;

use Model\Manager\UserManager;
use App\Router;
use App\Session;

class SecurityController
{
  public function register()
  {
    if (!empty($_POST)) {
      $pseudonym = filter_input(INPUT_POST, "pseudonym", FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
      $passverify = filter_input(INPUT_POST, "passverify", FILTER_SANITIZE_STRING);

      if ($pseudonym && $email && $password && $passverify) {
        if ($password == $passverify) {
          $model = new UserManager();

          if (!$model->findOneByEmail($email)) {
            if (!$model->findOneByPseudo($pseudonym)) {
              $hash = password_hash($password, PASSWORD_ARGON2I);
              if ($model->addUser($pseudonym, $email, $hash)) {
                Router::redirectTo("home", "index");
              }
            } else var_dump("Pseudo déjà existant");
          } else var_dump("Email déjà existant");
        } else var_dump("Mot de passe différent");
      } else var_dump("Champs manquant");
    }

    return [
      "view" => "security/register.php",
      "data" => null
    ];
  }

  public function login()
  {
    if (!empty($_POST)) {
      $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
      $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

      $model = new UserManager();

      if ($user = $model->findOneByEmail($email)) {
        if (password_verify($password, $user->getPassword())) {

          Session::setUser($user);
          Router::redirectTo("home", "index");
        } else var_dump("Mots de passe ne corresepondent pas");
      } else var_dump("Le compte n'existe pas");
    }
    return [
      "view" => "security/login.php",
      "data" => null
    ];
  }

  public function logout()
  {
    Session::removeUser();
    Router::redirectTo("home");
  }
}
