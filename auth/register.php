<!DOCTYPE html>
<html lang="en" >
<head>
 	<meta charset="UTF-8">
	<title>FabRice - S'inscrire</title>
	<link rel="stylesheet" href="./login.css">
  <script src="/fabriceWeb/script/redirect.js"></script> 
  <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style> 
    <style>
        .login .inputBx input[type="button"]{
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
    </style>
</head>

<?php
session_start(); //DO NOT ERRASE !!!
session_unset();
?>
<!-- partial:landing.partial.html -->
<body>
  <nav>
    <p class="sitename" id="menu-index">FabRice</p>
    <p class="menu" id="menu-reserver">Réserver</p>
    <p class="menu" id="menu-about">Qui est FabRice?</p>
    <p class="menu" id="menu-compte">Mon Compte</p>
    <p class="menu" id="menu-projet">Le Projet</p>
    <p class="menu" id="menu-legal">Légal</p>
    <svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"><path d="M0 0h24v24H0z" fill="none"/><path d="M19 9H5c-.55 0-1 .45-1 1s.45 1 1 1h14c.55 0 1-.45 1-1s-.45-1-1-1zM5 15h14c.55 0 1-.45 1-1s-.45-1-1-1H5c-.55 0-1 .45-1 1s.45 1 1 1z"/></svg>
  </nav>

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
                    </div>
                    <div class="inputBx">
                        <input type="text" name="prenom" placeholder="Prénom" autocomplete="on" required>
                    </div>

                    <div class="inputBx">
                        <input type="button" name="button" onclick="nextStep()" value="Suivant">
                    </div>
                </div>
                <!-- Step 2 -->
                <div class="step">
                    <div class="inputBx">
                        <input type="date" name="datenaissance" placeholder="Date de naissance" autocomplete="on" required>
                    </div>
                    <div class="inputBx">
                        <input type="text" name="numetudiant" placeholder="Numéro d'étudiant" autocomplete="on" required>
                    </div>
                    <div class="inputBx">
                        <input type="button" onclick="nextStep()" value="Suivant">
                    </div>
                </div>
                <!-- Step 3 -->
                <div class="step">
                    <div class="inputBx">
                        <input type="email" name="email" placeholder="Adresse Mail" autocomplete="on" required>
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password" placeholder="Mot de passe" autocomplete="on" required>
                    </div>
                    <div class="inputBx">
                        <input type="password" name="password-confirm" placeholder="Confirmer Mot de passe" autocomplete="on" required>
                    </div>
                    <div class="inputBx">
                        <input type="button" onclick="nextStep()" value="Suivant">
                    </div>
                </div>
                <!-- Step 4 -->
                <div class="step">
                    <div class="inputBx">
                        <input type="tel" name="numerotel" placeholder="Numéro de téléphone" autocomplete="on" required>
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

  <script>
        let currentStep = 0;

        function showStep(step) {
            const steps = document.querySelectorAll('.step');
            steps.forEach((stepElement, index) => {
                stepElement.classList.toggle('active', index === step);
            });
        }

        function nextStep() {
            const steps = document.querySelectorAll('.step');
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        showStep(currentStep);
    </script>

</body>