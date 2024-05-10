<!-- on importe le header -->
<?php require_once('./template/_header.php'); ?>
<?php require_once('./template/_form.php');
//on va démarrer une session
session_start();
//on regarde si une session existe
if(isset($_SESSION['email'])){

// si la session existe on redirige sur la page d'acceuil
header('Location: ./index.php');
exit();

}else{
// si la session n'existe pas on affiche le formulaire de connexion
form(
    './requete/authentification.php', //$action
    'Connectez-vous', //$title
    'Se connecter', //$button_name
    'Vous n\'avez pas compte ?', //$text
    './newlogin.php', //$link
    'Inscrivez-vous'//$button_link
);

} ?>
<!-- on importe le footer -->
<?php require_once('./template/_footer.php'); ?>