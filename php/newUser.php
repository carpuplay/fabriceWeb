<?php
// Initialize the session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is already logged in, if yes then redirect to the dashboard page
if (isset($_SESSION['email'])) {
    header('Location: /fabriceWeb/content/dashboard.php');
    exit();
}

require_once "./config.php";

// Register new user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $numetudiant = htmlspecialchars(trim($_POST['numetudiant']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $numeroTel = htmlspecialchars(trim($_POST['numerotel']));

    // Validate inputs
    if (empty($nom) || empty($prenom) || empty($numetudiant) || empty($email) || empty($password) || empty($numeroTel)) {
        die("All fields are required.");
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

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

    try {
        // Store in the database
        $stmt = $pdo->prepare('INSERT INTO users (nom, prenom, numetudiant, email, password, numeroTel, lastLogin, dateCreation) VALUES (:nom, :prenom, :numetudiant, :email, :password, :numeroTel, NOW(), NOW())');
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':numetudiant' => $numetudiant,
            ':email' => $email,
            ':password' => $hashed_password,
            ':numeroTel' => $numeroTel
        ]);

        echo "User registered successfully.";

        // Call emailVerification.php file
        header('Location: /fabriceWeb/php/emailVerification.php');
        exit();
    } catch (PDOException $e) {
        // Log the error message
        error_log($e->getMessage());
        die("There was an error registering the user.");
    }
}

?>