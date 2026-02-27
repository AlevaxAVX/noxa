<?php
require __DIR__ . '/vendor/autoload.php'; // Charger Composer

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load(); // Lire les variables du fichier .env

session_start();

try {
    $db = new PDO(
        'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=utf8;',
        $_ENV['DB_USER'],
        $_ENV['DB_PASS']
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base : " . $e->getMessage());
}
?>