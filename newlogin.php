<!-- on importe le header -->

<?php require_once('./template/_header.php'); ?>
<?php require_once('./template/_form.php'); ?>

<!-- on va démarrer la session -->
<?php session_start(); ?>


<?php
//on regarde si une session existe
if(isset($_SESSION['email'])){

// si la session existe on redirige sur la page d'acceuil
header('Location: ./index.php');
exit();

}else{
//ici on affiche le formulaire de création de compte
form(
    './requete/registration.php', //$action
    'Créer un compte', //$title
    'S\'enregistrer', //$button_name
    'Vous avez déjà un compte ?', //$text
    './login.php', //$link
    'Connectez-vous'//$button_link
);

}


?>

<!-- on importe le footer -->
<?php require_once('./template/_footer.php'); ?>