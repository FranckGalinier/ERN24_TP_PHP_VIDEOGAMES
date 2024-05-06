<?php

//méthode qui va afficher tout les jeux vidéos

function get_all_games(){
  global $connexion;

  $query = "SELECT * FROM `jeu`";
  if($result = mysqli_query($connexion, $query)){ //on ouvre la connexion et on fait la requete
    //on vérifie que l'on a des resultats
    if(mysqli_num_rows($result)>0){//au moins un resultat dans result
      //on peut parcourir les résultats
      while($jeu = mysqli_fetch_assoc($result)){//retourne pour chaque jouet un tableau associatif-->

        render_all_game($jeu); //renvoie le tableau associatif à la fonction render_all_toys qui va afficher les jouets dans la page
      }
    }
  }
}


function get_game_by_id($jeu_id){
  global $connexion;
  //on crée la requete, on récupère l'id de chaque jouet dans la variable
  $query = "SELECT j.titre, j.description, j.image_path, c.label FROM jeu as j
  INNER JOIN restriction_age as r ON j.age_id = r.id
  INNER JOIN note as n ON j.note_id = n.id
  INNER JOIN game_console as gc ON j.id = gc.id
  INNER JOIN console as c ON gc.id = c.id
  WHERE j.id = ?";

  //on prépare la requete
  if($stmt = mysqli_prepare($connexion, $query)){
    //on bind les param
    mysqli_stmt_bind_param($stmt, "i", $jeu_id);
  }
  //on exécute la requete
  if(!mysqli_execute($stmt)){
    echo "Erreur lors de l'exécution de la requete";
  }
  $result = mysqli_stmt_get_result($stmt);

  if(mysqli_num_rows($result)>0){
    while($jeu = mysqli_fetch_assoc($result)){
      render_game_detail($jeu);
    }
  }
}
