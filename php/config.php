<?php
$user="root";
$pass="";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=fabrice', $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>