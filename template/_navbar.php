<div class="mb-5 d-flex flex-column w-100">
  <a href="../index.php">
    <img class="m-2 logo" src="../images/logo.png" alt="Logo du site">
  </a>

  <nav class="navbar navbar-expand-lg custom_background w-100">
    <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class=" nav-item">
          <a class="btn btn-primary rounded-top" aria-current="page" href="../index.php">Tous les jeux</a>
        </li>

        <li class="nav-item dropdown">
          <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Par console
          </a>
          <ul class="dropdown-menu btn-primary btn-list">
            <?php get_console_with_count() ?>
          </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Par prix
            </a>
            <ul class=" dropdown-menu btn-list">
              <li><a class="dropdown-item btn" href="../index.php?order=asc">Prix croissant</a></li>
              <li><a class="dropdown-item btn" href="../index.php?order=desc">Prix décroissant</a></li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Par meilleure note
            </a>
            <ul class="dropdown-menu btn-list">
              <li><a class="dropdown-item btn" href="../index.php?note=media">Note presse</a></li>
              <li><a class="dropdown-item btn" href="../index.php?note=user">Note utilisateur</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Par tranche d'âge
          </a>
          <ul class="dropdown-menu btn-primary btn-list">
            <?php get_age() ?>
          </ul>
        </li>

      </ul>
    </div>
  </div>
  </nav>
</div>