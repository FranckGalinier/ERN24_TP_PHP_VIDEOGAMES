<?php

function form($action, $title, $button_name, $text, $link, $button_link){ ?>

  <div id="wrapper">
    <form action="<?php echo $action ?>" method="POST">
    <div>
      <h2 class="mb-3 text-center"><?php echo $title ?></h2>
      <!-- zone de retour d'erreur -->
        <?php if(isset($_GET['error'])){ ?>

          <p class="error"><?php echo $_GET['error'] ?></p>

        <?php } ?>

        <!-- Label et input -->
        <div class="mb-3">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="text" name="email" placeholder="Saisir votre email" title="Example d'email valide : nomprenom@gmail.com">
        </div>
        <div class="mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" placeholder="Saisir votre mot de passe" title="Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre">
        </div>

        <button class="btn btn-primary" type="submit"> <?php echo $button_name ?></button>
          <div class="d-flex justify-content-center align-items-center">
          <p class="sub_text m-3"><?php echo $text ?></p>
          <a class="link" href="<?php echo $link ?>"><?php echo $button_link ?></a>
        </div>
        <h4>Je ne veux pas me connecter <i class="bi bi-arrow-right"></i> &ensp;<a href="../index.php"><i class="bi bi-house-door-fill"></i></a></h4>
      </div>
      </form>
      
  </div>
<?php } 