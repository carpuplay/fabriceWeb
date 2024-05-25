<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FabRice - S'inscrire</title>
    <link rel="stylesheet" href="./login.css">
    <script src="/fabriceWeb/script/redirect.js"></script>
    <script src="/fabriceWeb/script/newUser.js" defer></script>
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
        .login .inputBx input[type="button"] {
            width: 100%;
            background: #424242;
            border: none;
            cursor: pointer;
            margin-top: 20px; /* Add margin-top to create space */
        }
        .login .inputBx input[type="button"]:hover {
            background: hsl(51, 100%, 65%);
            color: #141414;
            font-weight: bold;
            transition: filter 0.2s ease;
            filter: drop-shadow(0 0 20px hsl(51, 100%, 65%));
        }

        .inputBx .error-message {
            color: hsl(0, 100%, 70%);
            font-size: 0.8em;
            display: none;
            margin-top: 5px;
        }

        .inputBx input.error {
            border-color: hsl(0, 100%, 70%);
            box-shadow: 0 0 10px hsl(0, 100%, 70%);
        }

    </style>
</head>

<?php
session_start(); //DO NOT ERASE !!!
session_unset();
?>

<body>
    <div class="ring">
        <i style="--clr:hsl(51, 100%, 65%);"></i>
        <i style="--clr:#1226ff;"></i>
        <i style="--clr:#797979;"></i>
        <div class="login">
            <h2>S'inscrire</h2>
            <form id="multiStepForm" action="/fabriceWeb/php/newUser.php" method="post">
                <!-- Step 1 -->
                <div class="step active">
                    <div class="inputBx">
                        <input type="text" name="nom" placeholder="Nom" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="prenom" placeholder="Prénom" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="numetudiant" placeholder="Numéro d'étudiant" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="button" name="button" onclick="validateStep1()" value="Suivant">
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="step">
                    <div class="inputBx">
                        <input type="email" name="email" placeholder="Adresse Mail" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password" placeholder="Mot de passe" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password-confirm" placeholder="Confirmer Mot de passe" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="button" onclick="validateStep2()" value="Suivant">
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="step">
                    <div class="inputBx">
                        <input type="tel" name="numerotel" placeholder="Numéro de téléphone" autocomplete="on" required>
                        <span class="error-message"></span>
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="submit" value="S'inscrire">
                    </div>
                </div>
            </form>
            <div class="links">
                <a href="./login.php">Vous êtes déjà inscrit?</a>
            </div>
        </div>
    </div>

</body>
</html>
