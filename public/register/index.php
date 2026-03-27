<?php
session_start();
require __DIR__ . '/../config.php'; 

$errors = [];
$success = '';

if (isset($_POST["submit"])) {
    $mail = trim($_POST["mail"] ?? '');
    $pass = trim($_POST["pass"] ?? '');
    $pseudo = trim($_POST['pseudo'] ?? '');

    if (!$mail || !$pass || !$pseudo) {
        $errors[] = 'Veuillez compléter tous les champs.';
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Adresse e-mail invalide.';
    } else {
        $existingUser = supabase_select('users', ['mail' => $mail]);
        if ($existingUser) {
            $errors[] = 'Cette adresse e-mail est déjà utilisée.';
        } else {
            $hash = password_hash($pass, PASSWORD_BCRYPT);

            $user = supabase_insert('users', [
                'pseudo' => $pseudo,
                'mail'   => $mail,
                'pass'   => $hash
            ]);

            if ($user) {
                $_SESSION['mail'] = $user['mail'];
                $_SESSION['id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                header('Location: /web');
                exit;
            } else {
                $errors[] = 'Erreur lors de la création de l’utilisateur.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noxa - Inscription</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="big.png" type="image/x-icon">
</head>
<body>
<header>
    <img src="big.png" alt="logo">
    <ul id="list">
        <li id="buttona"><a href="/login">Se Connecter</a></li>
        <li id="buttonb"><a href="/register">S'Inscrire</a></li>
    </ul>
</header>

<form action="" method="post" align="center">
    <input type="email" name="mail" placeholder="Adresse E-Mail" autocomplete="off" value="<?= htmlspecialchars($_POST['mail'] ?? '') ?>" required>
    <br/>
    <input type="password" autocomplete="off" name="pass" placeholder="Mot de Passe" required>
    <br/>
    <input type="text" name="pseudo" placeholder="Pseudo" value="<?= htmlspecialchars($_POST['pseudo'] ?? '') ?>" required>
    <br/>
    <input type="submit" name="submit" value="Inscription">
</form>

<?php
foreach ($errors as $error) {
    echo '<p style="color:red;">'.htmlspecialchars($error).'</p>';
}
if ($success) {
    echo '<p style="color:green;">'.htmlspecialchars($success).'</p>';
}
?>
</body>
</html>
