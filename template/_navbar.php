<div class="mb-5 d-flex flex-column w-100">
  <a href="../index.php">
    <img class="m-2 logo" src="../images/logo.png" alt="Logo du site">
  </a>
  <?php
  session_start();
  if(isset($_SESSION['email'])) {
  ?>
  
  <h5>Bienvenue</h5>
  <p class="welcome_text"><i class="bi bi-person-check"></i> &ensp; <?php echo $_SESSION['email']  ?></p>
  <?php
  }
  ?>
  <!-- zone de retour d'erreur -->
  <?php if(isset($_GET['error'])){ ?>

  <p class="error"><?php echo $_GET['error'] ?></p>

  <?php } ?>

  <nav class="navbar navbar-expand-lg custom_background w-100 p ">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="column-gap: 2px;">
          <li class="nav-item nav-item bg-primary rounded-top">
            <a class=" nav-link active" aria-current="page" style="color: white" href="../index.php">Tous les jeux</a>
          </li>
            
        <li class="nav-item bg-primary dropdown rounded-top">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Par console
          </a>
          <ul class="dropdown-menu bg-primary">
            <?php get_console_with_count() ?>
          </ul>
        </li>

        <li class="nav-item bg-primary dropdown rounded-top">
            <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Par prix
            </a>
            <ul class=" dropdown-menu bg-primary">
              <li><a class="dropdown-item" href="../index.php?order=asc">Prix croissant</a></li>
              <li><a class="dropdown-item" href="../index.php?order=desc">Prix décroissant</a></li>
            </ul>
        </li>

        <li class="nav-item bg-primary dropdown rounded-top">
            <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Par meilleure note
            </a>
            <ul class="dropdown-menu bg-primary">
              <li><a class="dropdown-item" href="../index.php?note=media">Note presse</a></li>
              <li><a class="dropdown-item" href="../index.php?note=user">Note utilisateur</a></li>
            </ul>
        </li>

        <li class="nav-item bg-primary dropdown rounded-top">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Par tranche d'âge
          </a>
          <ul class="dropdown-menu bg-primary">
            <?php get_age() ?>
          </ul>
        </li>

        <?php
        if(isset($_SESSION['email'])) { ?>
          <li class="nav-item bg-primary dropdown rounded-top">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mon compte
          </a>
          <ul class="dropdown-menu bg-primary">
              <li><a class="dropdown-item" href="../add_game.php">Ajouter des jeux</a></li>
              <li><a class="dropdown-item" href="../requete/logout.php">Se déconnecter</a></li>
            </ul>
          </li>
        <?php

        }else{ ?>
        <li class="nav-item bg-primary dropdown rounded-top">
          <a class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Se connecter
          </a>
          <ul class="dropdown-menu bg-primary">
              <li><a class="dropdown-item" href="../newlogin.php">Je suis nouveau</a></li>
              <li><a class="dropdown-item" href="../login.php">On se connait déjà</a></li>
            </ul>
          </li>
       <?php } ?>
      </ul>
    </div>
  </div>
  </nav>
</div>