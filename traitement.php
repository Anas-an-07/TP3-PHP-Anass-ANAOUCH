<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Traitement du formulaire POST, validation et sauvegarde CSV
 * Date      : 2026-10-18
 */
require 'config.php';
include 'includes/entete_inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $note_info = $_POST['note_info'] ?? '';
    $note_math = $_POST['note_math'] ?? '';

    if (empty($nom) || $note_info === '' || $note_math === '') {
        echo "<h2 style='color:red'>Erreur : Tous les champs sont obligatoires.</h2>";
    } elseif (!is_numeric($note_info) || !is_numeric($note_math) || $note_info < NOTE_MIN || $note_info > NOTE_MAX || $note_math < NOTE_MIN || $note_math > NOTE_MAX) {
        echo "<h2 style='color:red'>Erreur : Les notes doivent être comprises entre " . NOTE_MIN . " et " . NOTE_MAX . ".</h2>";
    } else {
        $nom = htmlspecialchars($nom);
        echo "<h2>Récapitulatif :</h2>";
        echo "<p>Apprenant : $nom</p>";
        echo "<p>Note Info : $note_info</p>";
        echo "<p>Note Math : $note_math</p>";

        // Création du dossier data s'il n'existe pas
        if (!is_dir('data')) { mkdir('data', 0777, true); }
        
        // Écriture dans le fichier CSV
        $fichier = fopen('data/notes.csv', 'a');
        if ($fichier) {
            fputcsv($fichier, [$nom, $note_info, $note_math], ';');
            fclose($fichier);
            echo "<p style='color:green'>Données enregistrées avec succès dans data/notes.csv</p>";
        } else {
            echo "<p style='color:red'>Erreur d'ouverture du fichier.</p>";
        }
    }
} else {
    echo "<h2>Veuillez passer par le formulaire de saisie.</h2>";
}

include 'includes/pied_inc.php';
?>