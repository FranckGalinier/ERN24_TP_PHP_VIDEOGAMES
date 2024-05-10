<?php

//méthode de sécuridation de données en évitant les injections sql
function validate($data){
    return trim(stripslashes(htmlspecialchars($data)));
}

// méthode qui vérifie que le mdp contient une minuscule, une majuscule, un chiffre et au mois 8 caractères

function check_password($password){
    $regex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
    return preg_match($regex, $password);
}