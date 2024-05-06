<?php

function render_all_game($jeu){ ?>

  <div class="d-flex flex-column align-items-center card-body">
    <img class="game_image"src="../images/games/<?php echo $jeu['image_path'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
    <h5 class="game_name"> <?php echo $jeu['titre']?> </h5>
    <p class="game_price"> <?php echo str_replace('.',',',number_format(intval($jeu['prix'])/100,2))?>€</p>
    <a href="../detail.php?jeu_id=<?php echo $jeu['id'] ?>">Voir détail</a>
  </div>

<?php }

function render_game_detail($jeu){ ?>
  <div class="d-flex flex-column align-items-center">
  <h2 class="mt-3"><?php echo $jeu['titre'] ?></h2>
  <div class="d-flex justify-content-center">
    <div class="d-flex flex-column col-md-4 p-4">
      <img class="game_image" src="../images/games/<?php echo $jeu['image_path'] ?>" alt="image de <?php echo $jeu['titre'] ?>">
      

    </div>
    <div class="d-flex flex-column col-md-8 p-4">
      <p><?php echo $jeu['console_label'] ?> </p>
      <p><?php echo $jeu['description'] ?></p>
    </div>
  </div>
</div>
<?php }
