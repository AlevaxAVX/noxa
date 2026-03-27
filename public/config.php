<?php
$host = 'uldldhzwsijrfvwbdjvv.supabase.co'; 
$port = '5432';
$db   = 'Noxa';        
$user = 'postgres';     
$pass = 'Jx@pHGLws?NmB&8';  

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
