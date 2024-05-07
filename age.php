<?php require_once('./requete/connexion.php') ?>
<?php require_once('./requete/functions_sql.php') ?>

<?php require_once('./template/function_html.php') ?>
<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>


<?php $age = intval($_GET['age_id']) ?>

<h1> Jeux par age</h1>


<div class="d-flex flex-wrap justify-content-center">
  <?php get_game_by_age($age) ?>
</div>




<?php require_once('./template/_footer.php') ?>