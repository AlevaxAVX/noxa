<?php
session_start();
if (!$_SESSION['mail']){
    header('Location: /login');
}
try {
    $db = new PDO('mysql:host=localhost;dbname=nexa;charset=utf8;', 'root', 'Evanestbg-2013');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexa</title>
</head>
<body>
    <form action="" method="post"></form>
</body>
</html>