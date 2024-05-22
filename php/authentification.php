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

// Login user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database
    $stmt = $pdo->prepare('SELECT password FROM users WHERE username = :username');
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../controlPanel/controlPanel.php');
            exit;
        } else {
            // Invalid password
            echo "Invalid username or password.";
        }
    } else {
        // Username not found
        echo "Invalid username or password.";
    }
}
?>