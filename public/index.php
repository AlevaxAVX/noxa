<?php
session_start();
$isLogged = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Nexa</title>

<link rel="stylesheet" href="style.css">

<link rel="shortcut icon" href="big.png">

</head>

<body>

<header>

    <div class="logo">
        <img src="big.png">
        <h2>Nexa</h2>
    </div>

    <ul id="list">

        <?php if ($isLogged): ?>

            <li><a href="/web/">Chat</a></li>

            <li><a href="/profile/">Profil</a></li>

            <li><a href="/logout/">Logout</a></li>

        <?php else: ?>

            <li><a href="/login/">Se connecter</a></li>

            <li><a href="/register/">S'inscrire</a></li>

        <?php endif; ?>

    </ul>

</header>

<div class="hero">

    <h1>Bienvenue sur Nexa</h1>

    <p>
        Messagerie moderne, rapide et open-source.
    </p>

    <?php if ($isLogged): ?>

        <a href="/web/" class="main-btn">
            Ouvrir Nexa
        </a>

    <?php else: ?>

        <a href="/register/" class="main-btn">
            Commencer
        </a>

    <?php endif; ?>

</div>

</body>

</html>
