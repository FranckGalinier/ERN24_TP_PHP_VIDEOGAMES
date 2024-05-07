
<?php require_once('./requete/connexion.php') ?>
<?php require_once('./requete/functions_sql.php')?>
<?php require_once('./template/function_html.php')?>

<?php require_once('./template/_header.php')?>
<?php require_once('./template/_navbar.php')?>
<?php

$order = empty($_GET['order']) ? '' : $_GET['order'];
$note = empty($_GET['note']) ? '' : $_GET['note'];
//ici on va afficher les jeux disponibles
?>

<div class="d-flex flex-wrap justify-content-center">
  <?php
  get_all_games($order, $note);
  ?>
</div>
<?php




require_once('./template/_footer.php');