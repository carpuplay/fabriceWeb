<?php
$user="root";
$pass="";
try {
    $pdo = new PDO('mysql:host=localhost;dbname=data', $user, $pass);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    die("ERROR: Could not connect to db. " . $e->getMessage());
}
?>