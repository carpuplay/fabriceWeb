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

    // Validate name fields
    if (strlen($nom) < 2) {
        die("Le nom doit contenir au moins 2 caractères.");
    }

    if (strlen($prenom) < 2) {
        die("Le prénom doit contenir au moins 2 caractères.");
    }

    // Validate student number
    if (strlen($numetudiant) !== 8 || !is_numeric($numetudiant)) {
        die("Le numéro d'étudiant doit contenir 8 chiffres.");
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
        !preg_match("/[!@#$%^&*+\-_()<>\[\]]/", $password)) {
        die("Password must be at least 8 characters long and include a mix of upper/lower case letters, numbers, and special characters.");
    }

    // Validate phone number
    if (strlen($numeroTel) !== 10 || !is_numeric($numeroTel)) {
        die("Le numéro de téléphone doit contenir 10 chiffres.");
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
