<?php
/**
 * Auteur    : Anas Anaouch
 * Objectif  : Formulaire de connexion avec Sessions et Cookies
 * Date      : 2026-10-18
 */
session_start(); // TOUJOURS TOUTE PREMIERE INSTRUCTION

if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if (!empty($login)) {
        $_SESSION['login'] = $login;
        // Création du cookie valable 24h
        setcookie("dernier_login", $login, time() + 86400, "/");
        header("Location: profil.php");
        exit;
    }
}

require 'config.php';
include 'includes/entete_inc.php';

// Pré-remplissage avec le cookie
$login_val = $_COOKIE['dernier_login'] ?? '';
?>
<h2>Connexion</h2>
<form method="POST" action="login.php">
    <label>Login : <input type="text" name="login" value="<?= htmlspecialchars($login_val) ?>" required></label>
    <button type="submit">Se connecter</button>
</form>
<?php include 'includes/pied_inc.php'; ?>