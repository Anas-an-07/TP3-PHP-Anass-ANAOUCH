<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Lecture du fichier CSV et affichage des résultats
 * Date      : 2026-10-18
 */
require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

function mention($note) {
    if ($note >= 16) return "Très bien";
    if ($note >= 14) return "Bien";
    if ($note >= 12) return "Assez bien";
    if ($note >= SEUIL) return "Passable";
    return "Ajourné";
}

$fichier_csv = 'data/notes.csv';

echo "<h2>Liste des notes</h2>";

if (!file_exists($fichier_csv)) {
    echo "<p>Aucune note enregistrée pour le moment.</p>";
} else {
    $fichier = fopen($fichier_csv, 'r');
    if (!$fichier) {
        echo "<p style='color:red'>Erreur d'ouverture du fichier.</p>";
    } else {
        echo "<table><tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>";
        $somme_generale = 0;
        $nb_etudiants = 0;

        while (($ligne = fgetcsv($fichier, 1000, ';')) !== false) {
            // On s'assure que la ligne contient bien 3 éléments
            if (count($ligne) >= 3) {
                $nom = htmlspecialchars($ligne[0]);
                $info = (float)$ligne[1];
                $math = (float)$ligne[2];
                $moyenne = ($info + $math) / 2;
                
                $somme_generale += $moyenne;
                $nb_etudiants++;

                echo "<tr><td>$nom</td><td>$info</td><td>$math</td><td>" . round($moyenne, 2) . "</td><td>" . mention($moyenne) . "</td></tr>";
            }
        }
        echo "</table>";

        if ($nb_etudiants > 0) {
            $moy_classe = $somme_generale / $nb_etudiants;
            echo "<h3>Moyenne générale de la classe : " . round($moy_classe, 2) . "</h3>";
        }
        fclose($fichier);
    }
}
include 'includes/pied_inc.php';
?>