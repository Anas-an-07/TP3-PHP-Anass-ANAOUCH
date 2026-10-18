<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Exercices sur les bases (variables, constantes, types, chaînes)
 * Date      : 2026-10-18
 */

// --- PARTIE 0 : Mise en place ---
// Commentaire sur une ligne
# Autre commentaire sur une ligne
/* Commentaire
   sur plusieurs lignes */

require 'config.php';

echo "<h2>Exercice 1.1 : Noms de variables</h2>";
// Valides : $x, $_x, $Prix_HT, $état (les accents sont autorisés en UTF-8 en PHP)
// Invalides : $2x (commence par un chiffre), $x-y (tiret interdit), $prix ht (espace interdit)
$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "actif";

$a = "minuscule";
$A = "majuscule";
echo "La variable \$a contient : $a et \$A contient : $A (deux variables distinctes car PHP est sensible à la casse).<br>";


echo "<h2>Exercice 1.2 : Constantes</h2>";
echo "Établissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil : " . SEUIL . "<br>";

if (defined('SEUIL')) echo "La constante SEUIL est définie.<br>";
if (!defined('INCONNUE')) echo "La constante INCONNUE n'est pas définie.<br>";

/* 
 * Réponses :
 * 1. Si on affiche une constante non définie, PHP génère une erreur (Warning ou Fatal Error selon la version) et affiche son nom.
 * 2. Différence const vs define() : const s'utilise au niveau global ou dans une classe, define() peut être utilisé n'importe où (même dans une condition). const est plus rapide.
 */


echo "<h2>Exercice 1.3 : Calcul</h2>";
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "Le prix TTC du produit est de $prix_ttc €.<br>";


echo "<h2>Exercice 1.4 : Types et conversions</h2>";
$test = 42;
$test = (string) $test;
echo "Conversion de 42 en string : ";
var_dump($test);
echo "<br>";

// Prédictions et vérifications booléennes
var_dump((bool) 0);     // false
var_dump((bool) 0.0);   // false
var_dump((bool) "0");   // false
var_dump((bool) "");    // false
var_dump((bool) "abc"); // true
var_dump((bool) []);    // false
var_dump((bool) null);  // false
echo "<br>";

// Prédictions de conversions
var_dump((int) 3.9);      // 3
var_dump((int) "12abc");  // 12
var_dump((float) "1.5e3");// 1500.0
var_dump((int) true);     // 1
echo "<br>";

// Notation de 255
$dec = 255;
$hex = 0xFF;
$oct = 0o377; // ou 0377
$bin = 0b11111111;
echo "Décimal : $dec | Hexa : $hex | Octal : $oct | Binaire : $bin<br>";


echo "<h2>Exercice 1.5 : Chaînes de caractères</h2>";
$traitees = "égales à";
$ici = 2;

echo '1. Ahmed a dit : "J\'ai réussi"<br>';
echo '2. Voulez-vous supprimer C:\*.*?<br>';
echo '3. Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo '4. Les variables ne seront pas $traitees $ici<br>';
echo "5. Les variables seront $traitees $ici<br>";

$chaine = "*Bonjour les développeurs*";
echo "Trim : " . trim($chaine, "*") . "<br>";

$mot = "Bonjour";
for ($i = 0; $i < strlen($mot); $i++) {
    echo $mot[$i] . "<br>";
}
?>