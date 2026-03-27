<?php
session_start();
require __DIR__ . '/../config.php'; 

if (isset($_POST['submit'])) {
    $mail = trim($_POST['mail'] ?? '');
    $pass = $_POST['pass'] ?? '';

    if ($mail && $pass) {
        $user = supabase_select('users', ['mail' => $mail]); 

        if ($user && password_verify($pass, $user['pass'])) {
            $_SESSION['mail'] = $mail;
            $_SESSION['id'] = $user['id'];
            header('Location: /web');
            exit;
        } else {
            $error = "Mail ou mot de passe incorrect";
        }
    } else {
        $error = "Veuillez remplir tous les champs";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noxa - Connexion</title>
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
    <input type="email" name="mail" value="<?= htmlspecialchars($_POST['mail'] ?? '') ?>" required>
    <br/>
    <input type="password" autocomplete="off" name="pass" required>
    <br/>
    <input type="submit" name="submit" value="Connexion">
</form>

<?php if (!empty($error)) : ?>
    <p style="color:red; text-align:center"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
</body>
</html>
