
<?php
session_start();
require_once "../../config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login/");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $profile_id = intval($_GET['id']);
} else {
    $profile_id = $_SESSION['user_id'];
}

$stmt = $conn->prepare("
    SELECT id, username, avatar, bio, created_at
    FROM users
    WHERE id = ?
");

$stmt->execute([$profile_id]);
$user = $stmt->fetch();

if (!$user) {
    echo "Utilisateur introuvable.";
    exit;
}

$avatar = "../../uploads/default.png";

if (!empty($user['avatar']) && file_exists("../../uploads/" . $user['avatar'])) {
    $avatar = "../../uploads/" . $user['avatar'];
}

$is_own_profile = ($profile_id == $_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="UTF-8">
<title>Profil - Nexa</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
    <div class="profile-card">

        <img src="<?php echo $avatar; ?>" class="avatar">

        <h2>
            <?php echo htmlspecialchars($user['username']); ?>
        </h2>

        <!-- Bio -->
        <p class="bio">
            <?php
            if (!empty($user['bio'])) {
                echo htmlspecialchars($user['bio']);
            } else {
                echo "Aucune bio.";
            }
            ?>
        </p>

        <!-- Date -->
        <p class="date">

            Compte créé le :
            <?php echo date("d/m/Y", strtotime($user['created_at'])); ?>
        </p>
        
        <div class="buttons">
            <?php if ($is_own_profile): ?>
                <a href="edit.php" class="btn">
                    Modifier profil
                </a>
            <?php endif; ?>
            <a href="../web/" class="btn secondary">
                Retour chat
            </a>
        </div>
    </div>
</div>

</body>
</html>
