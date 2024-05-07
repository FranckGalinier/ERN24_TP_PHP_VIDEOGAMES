<?php require_once('./requete/connexion.php') ?>
<?php require_once('./requete/functions_sql.php') ?>

<?php require_once('./template/function_html.php') ?>
<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>


<?php $console_id = intval($_GET['console_id']) ?>

<div class="d-flex justify-content-center mb-3">
  <h1> Jeux par console </h1>
</div>

<div class="d-flex flex-wrap justify-content-center">
  <?php get_game_by_console($console_id) ?>
</div>




<?php require_once('./template/_footer.php') ?>