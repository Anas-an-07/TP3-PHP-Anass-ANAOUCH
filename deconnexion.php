<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Déconnexion et destruction de la session
 * Date      : 2026-10-18
 */
session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
?>