<?php

function render_all_game($jeu){ ?>
<div class="card">
  <div class="d-flex flex-column card-body" style="width: 18rem;">
    <img class="game_image"src="../images/games/<?php echo $jeu['image_path'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
    <h5 class="card-title"> <?php echo $jeu['titre']?> </h5>
    <p class="card-text"> <?php echo str_replace('.',',',number_format(intval($jeu['prix'])/100,2))?>€</p>
    <a class="btn btn-primary" href="../detail.php?jeu_id=<?php echo $jeu['id'] ?>">Voir détail</a>
  </div>
</div>

<?php }

function render_game_detail($jeu){ ?>
  <div class=" card d-flex flex-column align-items-center">
  <div class="d-flex justify-content-center">
    <div class="d-flex flex-column col-md-4 p-4">
      <img class="card-image" src="../images/games/<?php echo $jeu['image_path'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
      

    </div>
    <div class="d-flex flex-column  p-4">
      <h2 class="mt-3"><?php echo $jeu['titre'] ?></h2>
      <p><?php echo $jeu['console_labels'] ?> </p>
      <p> Synopsys : <?php echo $jeu['description'] ?></p>
      <p> Date de sortie : <?php echo  date('d/m/Y',strtotime($jeu['date_sortie'])) ?></p>
      <div class="d-flex mr-2 align-items-center">
      <img class="pegi" src="../images/pegi/<?php echo $jeu['imagepegi'] ?>" alt="">
      <p> age : <?php echo $jeu['age'] ?>+</p>
      </div>
      <div class="d-flex">
      <p><i class="bi bi-star-fill"></i> Avis presse : <?php echo $jeu['media'] ?>/20</p>
      <p><i class="bi bi-star-fill"></i> Avis utilisateur : <?php echo $jeu['utilisateur'] ?>/20</p>
      </div>
    </div>
  </div>
</div>
<?php }
