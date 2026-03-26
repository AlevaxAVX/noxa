<?php
$host = 'ton_host_supabase';
$port = '5432';
$db   = 'noxa_db';
$user = 'ton_user';
$pass = 'ton_motdepasse';
$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
