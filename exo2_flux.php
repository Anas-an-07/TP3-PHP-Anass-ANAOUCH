<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Exercices sur les structures de contrôle et les boucles
 * Date      : 2026-10-18
 */

require 'config.php';

echo "<h2>Exercice 2.1 : if / elseif / else</h2>";

// Fonction qui retourne la mention selon la note
function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

// Tests
$notes_test = [18, 15, 13, 10, 8];
foreach ($notes_test as $n) {
    echo "Note : $n => Mention : " . mention($n) . "<br>";
}


echo "<h2>Exercice 2.2 : switch</h2>";

// Récupération du mois courant
$mois = date("m"); 
// On convertit en entier pour enlever le zéro (ex: "03" devient 3)
$mois = (int)$mois;

switch ($mois) {
    case 1:  $nom_mois = "Janvier"; break;
    case 2:  $nom_mois = "Février"; break;
    case 3:  $nom_mois = "Mars"; break;
    case 4:  $nom_mois = "Avril"; break;
    case 5:  $nom_mois = "Mai"; break;
    case 6:  $nom_mois = "Juin"; break;
    case 7:  $nom_mois = "Juillet"; break;
    case 8:  $nom_mois = "Août"; break;
    case 9:  $nom_mois = "Septembre"; break;
    case 10: $nom_mois = "Octobre"; break;
    case 11: $nom_mois = "Novembre"; break;
    case 12: $nom_mois = "Décembre"; break;
    default: $nom_mois = "Mois inconnu";
}

echo "Le mois actuel est : $mois ($nom_mois)<br>";
// Réponse : Si on oublie un break, PHP continue d'exécuter les cas suivants (fall-through).


echo "<h2>Exercice 2.3 : Boucles</h2>";

// 1. Triangle d'étoiles
echo "<h3>1. Triangle</h3>";
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}

// 2. while de 0 à 20 par pas de 2
echo "<h3>2. While par pas de 2</h3>";
$i = 0;
while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
}
echo "<br>";

// 3. for avec continue (nombres pairs)
echo "<h3>3. For avec continue</h3>";
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue; // Ignore les impairs
    }
    echo "$i ";
}
echo "<br>";

// 4. while + switch + break 2
echo "<h3>4. Break 2</h3>";
$i = 1;
while (true) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break; // Sort uniquement du switch
        case 10:
            echo "At 10; quitting<br>";
            break 2; // Sort du switch ET de la boucle while
        default:
            echo "$i ";
            break;
    }
    $i++;
}

// 5. do-while
echo "<h3>5. Do-while</h3>";
$i = 0;
do {
    if ($i == 10) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
    $i += 2;
} while ($i <= 20);
echo "<br>";

// Différence : while vérifie la condition AVANT d'exécuter le corps (peut faire 0 tour).
// do-while exécute le corps AU MOINS UNE FOIS avant de vérifier la condition.
?>