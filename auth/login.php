<!DOCTYPE html>
<html lang="en" >
<head>
 	<meta charset="UTF-8">
	<title>FabRice - Se connecter</title>
	<link rel="stylesheet" href="./login.css">
  <script src="/fabriceWeb/script/redirect.js"></script>  
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
          <h2>Se Connecter</h2>
          <form action="/fabriceWeb/php/authentification.php" method="post">
            <div class="inputBx">
              <input type="email" name="email" placeholder="Adresse Mail" autocomplete="on">
            </div>
            <div class="inputBx">
              <input type="password" name="password" placeholder="Mot de passe" autocomplete="on">
            </div>
            <div class="inputBx">
              <input type="submit" name="submit" value="Se connecter">
            </div>
          </form>
        <div class="links">
          <a href="#">Mot de passe oublié?</a>
          <a href="./register.php">S'enregistrer</a>
        </div>
      </div>
    </div>
  </div>
</body>