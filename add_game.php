<!-- on importe le header et la navbar -->
<?php require_once('./template/_header.php'); ?>



<div class="d-flex justify-content-center mt-5">
  <h1>Ajouter un jeu</h1>
</div>

  <div class="col-12 d-flex flex-column p-2">
    <form action="./requete/add_new_game.php" method="POST" enctype="multipart/form-data"> <!-- on va gérer des fichiers donc on ajoute enctype="multipart/form-data" -->

      <!-- zone de retour d'erreur -->
      <?php if(isset($_GET['error'])){ ?>
      <p class="error"><?php echo $_GET['error'] ?></p>
      <?php } ?>
      <div class="card">
        <div class="card-body d-flex justify-content-center">

        <div class="d-flex flex-column col-md-4 p-2">
        <!-- input pour l'image-->
        <label for="image">Charger une image</label>
        <input type="file" name="image">
        </div>

        <div class="p-2 pt-0">
        <!-- input pour le titre du jeu -->
        <label for="title">Nom du jeu</label>
        <input type="text" name="title" placeholder="Nom du jeu">
        
        <!-- input pour la ou les consoles du jeu
        select multiple pour pouvoir choisir plusieurs consoles -->
        <label for="console">Console</label>
        <select name="console[]" multiple>
          <?php get_all_console() ?>
        <!-- input pour la description -->
        <div class="d-flex flex-column mb-3">
          <label for="description">Sysnopsis</label>
          <textarea name="description" placeholder="Sysnopsis" cols="30" rows="10"></textarea>
        </div>

        <!-- bouton submit -->
        <div class="d-flex justify-content-center mt-4">
          <button class="btn bg-primary" type=""submit>Ajouter</button>
        </div>

      </div>
      </div>
      </div>
    </form>
</div>

<!-- on importe le footer -->
<?php require_once('./template/_footer.php'); ?>