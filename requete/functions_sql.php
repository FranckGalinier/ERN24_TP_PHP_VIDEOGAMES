<?php

//méthode qui va afficher tout les jeux vidéos
function get_all_games($order, $note){
  global $connexion;

  $query = "SELECT jeu.id, jeu.titre, jeu.prix, jeu.image_path AS image FROM `jeu`";
  if ($order =='asc'){
    $query .= "ORDER BY prix ASC";
  } else if ($order == 'desc') {
    $query .= "ORDER BY prix DESC";
  } else if ($note == 'media'){
    $query .= "INNER JOIN note ON note.id = jeu.note_id
    ORDER BY note_media DESC";
  }else if ($note == 'user'){
    $query .= "INNER JOIN note ON note.id = jeu.note_id
    ORDER BY note_utilisateur DESC";
  }
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

//méthode qui permet d'afficher les détails d'un jeu
function get_game_by_id($jeu_id){
  global $connexion;
  //on crée la requete, on récupère l'id de chaque jouet dans la variable
  $query = "SELECT j.titre, j.description, j.image_path, GROUP_CONCAT(DISTINCT c.label SEPARATOR '&nbsp; |&nbsp; ') AS console_labels, j.date_sortie,
  r.image_path as imagepegi, r.label as age, n.note_media as media, n.note_utilisateur as utilisateur
  FROM jeu as j
  INNER JOIN restriction_age as r ON j.age_id = r.id
  INNER JOIN note as n ON j.note_id = n.id
  INNER JOIN game_console as gc ON j.id = gc.jeu_id
  INNER JOIN console as c ON gc.console_id = c.id
  WHERE gc.jeu_id = ?
  GROUP BY j.id";

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

//méthode qui récupère le nom de la console et affiche le nombre de jeux disponible
function get_console_with_count(){
  global $connexion;

  $query = "SELECT console.id, console.label, COUNT(game_console.jeu_id) AS total  
  FROM console
  INNER JOIN game_console ON console.id = game_console.console_id
  GROUP BY console.id";

 //on execute la requete
 if ($result = mysqli_query($connexion, $query)) {
  //on vérifie que l'on a des resultats
  if (mysqli_num_rows($result) > 0) {
    //on peut parcourir les résultats
    while ($console = mysqli_fetch_assoc($result)) { ?>
      <li>
        <a class="dropdown-item btn" href="../console.php?console_id=<?php echo $console['id'] ?>">
          <?php echo $console['label'] ?> ( <?php echo $console['total'] ?> )
        </a>
      </li>
      <?php }
    }
 }
}

//méthode qui récupère les jeux en fonction de la console
function get_game_by_console($console_id){
  //on récupère la connexion
  global $connexion;

  $query = "SELECT game_console.jeu_id, jeu.id, jeu.titre, jeu.prix, jeu.image_path AS image FROM game_console INNER JOIN jeu ON game_console.jeu_id = jeu.id WHERE console_id = ?";
  //on prépare la requête
  if($stmt = mysqli_prepare($connexion,$query)){
    //on bind les paramètres
    mysqli_stmt_bind_param($stmt, "i", $console_id);

    //on exécute la requete
    if(!mysqli_stmt_execute($stmt)){
      echo "erreur lors de l'execution de la requete";
    }
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
      while ($jeu = mysqli_fetch_assoc ($result)){
        render_all_game($jeu);
      } 
    }
  }
}

function get_age(){

  global $connexion;

  $query = "SELECT restriction_age.label, restriction_age.id
  FROM restriction_age
  GROUP BY restriction_age.id";

 //on execute la requete
 if ($result = mysqli_query($connexion, $query)) {
  //on vérifie que l'on a des resultats
  if (mysqli_num_rows($result) > 0) {
    //on peut parcourir les résultats
    while ($id = mysqli_fetch_assoc($result)) { ?>
      <li>
        <a class=" btn dropdown-item" href="../age.php?age_id=<?php echo $id['id'] ?>">+
          <?php echo $id['label'] ?> ans
        </a>
      </li>
      <?php }
    }
 }
}


//méthode qui récupère l'id de l'âge pour afficher les jeux pas tranche d'âge
function get_game_by_age($age){

  global $connexion;
  $query ="SELECT jeu.id, jeu.titre, jeu.prix, jeu.image_path AS image FROM jeu INNER JOIN restriction_age ON jeu.age_id = restriction_age.id
     WHERE restriction_age.id = ?";
  //on prépare la requête
  if($stmt = mysqli_prepare($connexion,$query)){
    //on bind les paramètres
    mysqli_stmt_bind_param($stmt, "i", $age);

    //on exécute la requete
    if(!mysqli_stmt_execute($stmt)){
      echo "erreur lors de l'execution de la requete";
    }
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
      while ($jeu = mysqli_fetch_assoc ($result)){
        render_all_game($jeu);
      } 
    }
  }
}
