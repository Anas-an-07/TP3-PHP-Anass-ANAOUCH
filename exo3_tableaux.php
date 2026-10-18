<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Exercices sur les tableaux
 * Date      : 2026-10-18
 */

require 'config.php';
include 'includes/entete_inc.php';
include 'includes/menu_inc.php';

// Fonction mention (nécessaire pour l'exercice)
function mention($note) {
    if ($note >= 16) return "Très bien";
    if ($note >= 14) return "Bien";
    if ($note >= 12) return "Assez bien";
    if ($note >= SEUIL) return "Passable";
    return "Ajourné";
}

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];

echo "<h2>Exercice 3.2 : Affichage HTML</h2>";
echo "<table><tr><th>Nom</th><th>Note</th><th>Mention</th></tr>";
foreach ($notes as $nom => $note) {
    $classe = ($note < SEUIL) ? "class='rouge'" : "";
    echo "<tr $classe><td>$nom</td><td>$note</td><td>" . mention($note) . "</td></tr>";
}
echo "</table>";

echo "<h2>Exercice 3.3 : Statistiques</h2>";
$somme = 0; $max = -1; $min = 21;
foreach ($notes as $note) {
    $somme += $note;
    if ($note > $max) $max = $note;
    if ($note < $min) $min = $note;
}
$moyenne = $somme / count($notes);
echo "Somme : $somme | Moyenne : " . round($moyenne, 2) . " | Max : $max | Min : $min<br>";

$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) $effectifs[$m] = 0;
    $effectifs[$m]++;
}
echo "<pre>"; print_r($effectifs); echo "</pre>";

echo "<h2>Exercice 3.4 : Tri</h2>";
function afficher($tab) {
    echo "<table><tr><th>Nom</th><th>Note</th></tr>";
    foreach ($tab as $nom => $note) {
        echo "<tr><td>$nom</td><td>$note</td></tr>";
    }
    echo "</table><br>";
}

$temp = $notes;
ksort($temp); echo "<h3>Tri par noms croissants (ksort)</h3>"; afficher($temp);

$temp = $notes;
arsort($temp); echo "<h3>Tri par notes décroissantes (arsort)</h3>"; afficher($temp);

$temp = $notes;
krsort($temp); echo "<h3>Tri par noms décroissants (krsort)</h3>"; afficher($temp);

$temp = $notes;
asort($temp); echo "<h3>Tri par notes croissantes (asort)</h3>"; afficher($temp);

include 'includes/pied_inc.php';
?>