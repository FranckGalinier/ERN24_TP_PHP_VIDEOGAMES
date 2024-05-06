<?php

// on déclare nos constantes de connexion à la base de données
define('DB_HOST', 'database');
define('DB_USER', 'admin');
define('DB_PASS', 'admin');
define('DB_NAME', 'videogames');

//on crée la connexion à la bdd
$connexion = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$connexion){
    die('Erreur de connexion'.mysqli_connect_error());
}

//on force l'encodage en utf8
mysqli_set_charset($connexion, 'utf8');