<?php

require_once('./connexion.php');
require_once('../tools/function.php');

if(isset($_POST['email']) && isset($_POST['password'])){
  //on va déclarer et sécuriser les variables
  $email = strtolower(validate($_POST['email']));
  $password = validate($_POST['password']);
  // Vérification des champs vides et de la validité de l'email et du mot de passe
  if (empty($email)) {
    header('Location: ../login.php?error=Veuillez renseigner votre email');
    exit();
  } else if (empty($password)) {
    header('Location: ../login.php?error=Veuillez renseigner votre mot de passe');
    exit();
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../login.php?error=Veuillez renseigner un email valide');
    exit();
  }else{
    // on vérifie que l'utilisateur existe bien dans la base de données
    //on récupère la connexion
    global $connexion;
    $query = "SELECT * FROM `user` WHERE email = '". $email ."'"; //on passe la variable dans la requête (exécution directe)
    //on exécute la requête
    if($result=mysqli_query($connexion,$query)){

      //on regarde si on a pas un résultat
      if(mysqli_num_rows($result)<1){ //si on pas de résultat
        //on ferme la connexion
        mysqli_close($connexion);
        header('Location: ../login.php?error= Email ou mot de passe incorrect');
        exit();
      }
      // si on a un résultat, on vérifie le combo email/mot de passe
      while($user=mysqli_fetch_assoc($result)){

        if($user['email']=== $email && password_verify($password,$user['password'])){ //vérifie si l'email et le mot de passe correspondent
          //on démarre la session
          session_start();
          //on stocke les informations de l'utilisateur dans la session
          $_SESSION['email']=$user['email'];
          $_SESSION['id']=$user['id'];
          //on ferme la connexion
          mysqli_close($connexion);
          //on redirige l'utilisateur vers la page d'accueil
          header('Location: ../index.php');
          exit();
        }else{
          //on ferme la connexion
          mysqli_close($connexion);
          //si on a pas de résultat donc de correspondance
          header('Location: ../login.php?error= Email ou mot de passe incorrect');
          exit();
        }
      }


    }else{
      var_dump('Erreur de formulaire');
    }
  }
}