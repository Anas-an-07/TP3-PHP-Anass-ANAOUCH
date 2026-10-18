<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Page de profil protégée par Session
 * Date      : 2026-10-18
 */
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'config.php';
include 'includes/entete_inc.php';
?>
<h2>Profil</h2>
<p>Bienvenue, <?= htmlspecialchars($_SESSION['login']) ?> !</p>
<p><a href="deconnexion.php">Se déconnecter</a></p>
<?php include 'includes/pied_inc.php'; ?>