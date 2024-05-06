
<?php require_once('./requete/connexion.php') ?>
<?php require_once('./requete/functions_sql.php')?>
<?php require_once('./template/function_html.php')?>

<?php require_once('./template/_header.php')?>
<?php require_once('./template/_navbar.php')?>
<?php


//ici on va afficher les jeux disponibles
?>
<div class="d-flex flex-wrap justify-content-center">
  <?php
  get_all_games();
  ?>
</div>
<?php




require_once('./template/_footer.php');