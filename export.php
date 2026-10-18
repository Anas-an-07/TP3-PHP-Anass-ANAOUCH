<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Exportation des données au format JSON
 * Date      : 2026-10-18
 */
require 'config.php';
include 'includes/entete_inc.php';

// Tableau associatif (simulé pour l'export)
$resultats = [
    "Mohamed" => ["info" => 16, "math" => 14, "moyenne" => 15],
    "Sara"    => ["info" => 12, "math" => 18, "moyenne" => 15]
];

// 1 & 2. JSON
$json = json_encode($resultats, JSON_PRETTY_PRINT);
if (!is_dir('data')) { mkdir('data', 0777, true); }
file_put_contents('data/notes.json', $json);
echo "<h2>Fichier JSON exporté avec succès.</h2>";

// 3. Relecture JSON
$json_lu = file_get_contents('data/notes.json');
$tableau_lu = json_decode($json_lu, true);
echo "<h3>Contenu relu du JSON :</h3>";
echo "<pre>"; print_r($tableau_lu); echo "</pre>";

// 4. Comparaison avec serialize()
$serialized = serialize($resultats);
echo "<h3>Format serialize() :</h3>";
echo "<pre>" . htmlspecialchars($serialized) . "</pre>";

include 'includes/pied_inc.php';
?>