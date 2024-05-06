<?php require_once('./requete/connexion.php') ?>
<?php require_once('./requete/functions_sql.php') ?>
<?php require_once('./template/function_html.php') ?>

<?php require_once('./template/_header.php') ?>
<?php require_once('./template/_navbar.php') ?>

<?php 



$jeu_id = intval($_GET['jeu_id']); //on récupére l'id qui est dans l'url

get_game_by_id($jeu_id);

?>

<?php require_once('./template/_footer.php') ?>