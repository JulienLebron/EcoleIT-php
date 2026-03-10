<?php 

// Outil majeur de PHP nous permettant de stocker des informations avant l'enregistrement en BDD ou autre 
// Exemple : 
// conservation d'un panier avant la validation de la commande qui nous permettra d'enregistrer la commande en BDD
// maintenir la connexion d'un utilisateur sur notre site 


// session_start() permet de créer un fichier de session dans le serveur au niveau du dossier tmp/
// xampp/tmp
// mamp/tpm/php
// et aussi un cookie sur le navigateur de l'utilisateur lié à la session
session_start();

// $_SESSION est une superglobale (tableau array)
// $_SESSION n'existe pas tant que l'on ne la pas crée avec un session_start()

$_SESSION['pseudo'] = 'Admin';
$_SESSION['mdp'] = '2xzap^klfoejzf';
$_SESSION['email'] = 'lebron.pro@gmail.com';
$_SESSION['adresse'] = '3 rue Aristide briand';
$_SESSION['ville'] = 'Paris';

echo '<pre>';
print_r($_SESSION);
echo '</pre>';

// Pour supprimer une session
// session_destroy() est bien reconnu par le langage mais ne sera exécutée immédiatement
// le langage va d'abord exécuter toutes les lignes de code de cette page et ensuite la fonction session_destroy() pour supprimer la session
session_destroy();

echo '<pre>';
print_r($_SESSION);
echo '</pre>';