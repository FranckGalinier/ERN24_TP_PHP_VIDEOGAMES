<?php

function render_all_game($jeu){ ?>
  <div class="card m-2" style="width: 15rem;">
    <div class="card-body d-flex flex-column align-items-start">
      <img class="image-index"src="../images/games/<?php echo $jeu['image'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
      <div class="index-description">
        <h5 class="card-title"> <?php echo $jeu['titre']?> </h5>
        <p class="card-text"> <?php
         if($jeu['prix']==0){
          echo "GRATUIT";
          }else{ echo str_replace('.',',',number_format(intval($jeu['prix'])/100,2)) .'€' ; }
          ?>
          </p>
        <a class="btn bg-primary" href="../detail.php?jeu_id=<?php echo $jeu['id'] ?>">Voir détail</a>
      </div>
    </div>
  </div>

<?php }

function render_game_detail($jeu){ ?>
  <div class="card">
    <div class="card-body d-flex justify-content-center">

      <div class="d-flex flex-column col-md-4 p-2">
        <img class="card-image" src="../images/games/<?php echo $jeu['image_path'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
      </div>

      <div class="p-2 pt-0">
        <h2><span class="note-bleu titre"><?php echo $jeu['titre'] ?></span></h2>
        <?php
        // ici on récupère les labels pour les afficher un dans chaque badge
        $array = explode(',', $jeu['console_labels']);
        foreach ($array as $jeux) {
        echo '<p class="badge rounded-pill text-bg-primary">' . $jeux . '</p>';
      
        }
        ?>

        <p><strong> Synopsis </strong>: <?php echo $jeu['description'] ?></p>

        <p> Date de sortie :<span class="note-bleu"> <?php echo  date('d/m/Y',strtotime($jeu['date_sortie'])) ?></span></p>
        <div class="d-flex mr-2 align-items-center text-align-center">
          <div class="card">
           <img class="pegi p-1" src="../images/pegi/<?php echo $jeu['imagepegi'] ?>" alt="">
          </div>
        <p class="age"> age : <?php echo $jeu['age'] ?>+</p>
      </div>
      <div class="d-flex justify-content-around  avis">
        <p><i class="bi bi-star-fill"></i> Avis presse : <span class="note-bleu"><?php echo $jeu['media'] ?></span>/20</p>
        <p><i class="bi bi-star-fill"></i> Avis utilisateur : <span class="note-bleu"><?php echo $jeu['utilisateur'] ?></span>/20</p>
      </div>
     </div>
    </div>
  </div>
<?php }

