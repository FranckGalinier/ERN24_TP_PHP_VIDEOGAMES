<?php
 
require_once('./connexion.php');
require_once('../tools/function.php');
// Vérification de la réception des données du formulaire
if (isset($_POST['email']) && isset($_POST['password'])) {
  // Déclaration et sécurisation des variables
  $email = strtolower(validate($_POST['email']));
  $password = validate($_POST['password']);
  $created_at = time();
 
  // Hashage du mot de passe
  $pass_hash = password_hash($password, PASSWORD_BCRYPT);
 
  // Vérification des champs vides et de la validité de l'email et du mot de passe
  if (empty($email)) {
    header('Location: ../newlogin.php?error=Veuillez renseigner votre email');
    exit();
  } else if (empty($password)) {
    header('Location: ../newlogin.php?error=Veuillez renseigner votre mot de passe');
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../newlogin.php?error=Veuillez renseigner un email valide');
    exit();
  } else if (!check_password($password)) {
    header('Location: ../newlogin.php?error=Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre');
    exit();
  } else {
    // Vérification si l'email existe déjà dans la base de données
    $query = "SELECT * FROM `user` WHERE email = ?";
    if ($stmt = mysqli_prepare($connexion, $query)) {
      mysqli_stmt_bind_param($stmt, 's', $email);
      $execute = mysqli_stmt_execute($stmt);
      if ($execute) {
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
          // Si l'email existe déjà
          header('Location: ../newlogin.php?error=Cet email existe déjà');
          exit();
        } else {
          // Insertion des données dans la base de données
          $query_post = "INSERT INTO `user` (email, password, created_at) VALUES (?, ?, ?)";
          if ($stmt_post = mysqli_prepare($connexion, $query_post)) {
            mysqli_stmt_bind_param($stmt_post, "ssi", $email, $pass_hash, $created_at);
            if (mysqli_stmt_execute($stmt_post)) {
              // Récupération de l'utilisateur fraîchement inscrit
              $stmt_get = mysqli_prepare($connexion, $query);
              mysqli_stmt_bind_param($stmt_get, 's', $email);
              $execute_get = mysqli_stmt_execute($stmt_get);
              if ($execute_get) {
                $result_get = mysqli_stmt_get_result($stmt_get);
                if (mysqli_num_rows($result_get) > 0) {
                  // Démarrage de la session et redirection vers la page d'accueil
                  session_start();
                  $new_user = mysqli_fetch_assoc($result_get);
                  $_SESSION['email'] = $new_user['email'];
                  $_SESSION['id'] = $new_user['id'];
                  header('Location: ../index.php');
                  exit();
                } else {
                  // Si l'utilisateur n'existe pas
                  header('Location: ../newlogin.php?error=Erreur lors de la récupération de l\'utilisateur');
                  exit();
                }
              }
            } else {
              // Si l'insertion a échoué
              header('Location: ../newlogin.php?error=Erreur lors de l\'insertion des données dans la BDD');
              exit();
            }
          } else {
            // Si la requête d'insertion ne s'est pas bien préparée
            header('Location: ../newlogin.php?error=Erreur de requête SQL pour insérer l\'utilisateur');
            exit();
          }
        }
      } else {
        // Si la requête de vérification ne s'est pas bien exécutée
        header('Location: ../newlogin.php?error=Erreur d\'exécution de la requête SQL de vérification');
        exit();
      }
    } else {
      // Si la requête de vérification ne s'est pas bien préparée
      header('Location: ../newlogin.php?error=Erreur de requête SQL');
      exit();
    }
  }
} else {
  var_dump('erreur de formulaire');
}