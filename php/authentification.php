<?php
// Initialize the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is already logged in, if yes then redirect him to dashboard page
if (isset($_SESSION['email'])) {
    header('Location: /fabriceWeb/content/dashboard.php');
    exit();
}

require_once "./config.php";

// Login user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the hashed password from the database
    $stmt = $pdo->prepare('SELECT password FROM users WHERE email = :email');
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            // Update the lastLogin value in the database
            $stmt = $pdo->prepare('UPDATE users SET lastLogin = NOW() WHERE email = :email');
            $stmt->execute([':email' => $email]);
            header('Location: /fabriceWeb/content/dashboard.php');
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