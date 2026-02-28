<?php
require __DIR__ . '/../config.php';
if (!$_SESSION['pass']) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="big.png" type="image/x-icon">
</head>
<body>
    <header>
        <img src="big.png" alt="logo">
        <ul id="list">
            <li id="buttona"><a href="/">Home</a></li>
            <li id="buttonb"><a href="/logout">Se Déconnecter</a></li>
        </ul>
    </header>
    <form action="" method="post"></form>
</body>
</html>