<?php
// Initialize the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is already logged in, if yes then redirect him to dashboard page
if (isset($_SESSION['email'])) {
    header('Location: ../controlPanel/controlPanel.php');
    exit();
}

require_once "../php/config.php";

// Register new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $password = $_POST['password'];


    // Check password complexity
    if (strlen($password) < 8 || 
        !preg_match("/[A-Z]/", $password) || 
        !preg_match("/[a-z]/", $password) || 
        !preg_match("/[0-9]/", $password) || 
        !preg_match("/[!@#$%^&*]/", $password)) {
        die("Password must be at least 8 characters long and include a mix of upper/lower case letters, numbers, and special characters.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Store in the database
    $stmt = $pdo->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
    $stmt->execute([
        ':username' => $username,
        ':password' => $hashed_password
    ]);

    echo "User registered successfully.";
}
?>