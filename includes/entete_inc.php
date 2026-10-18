<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : En-tête HTML commune
 * Date      : 2026-10-18
 */
require_once __DIR__ . '/../config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= ETABLISSEMENT ?> - Suivi des notes</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        .rouge { color: red; }
        nav a { margin-right: 15px; }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenue à <?= ETABLISSEMENT ?></h1>
    </header>