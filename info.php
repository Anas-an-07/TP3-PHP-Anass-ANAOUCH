<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Traitement du formulaire GET info.html
 * Date      : 2026-10-18
 */
require 'config.php';
include 'includes/entete_inc.php';

if (isset($_GET['nom'], $_GET['prenom'], $_GET['sexe'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe = $_GET['sexe'];

    $titre = ($sexe === 'M') ? "Monsieur" : "Madame";
    echo "<h2>Bonjour $titre $prenom $nom</h2>";
} else {
    echo "<h2>Erreur : veuillez remplir le formulaire.</h2>";
}

include 'includes/pied_inc.php';
?>