<!DOCTYPE html>
<html lang="en" >
<head>
 	<meta charset="UTF-8">
	<title>FabRice - S'inscrire</title>
	<link rel="stylesheet" href="./register.css">  
</head>

<?php
session_start(); //DO NOT ERRASE !!!
session_unset();
?>
<!-- partial:landing.partial.html -->

<div class="ring">
  <i style="--clr:hsl(51, 100%, 65%);"></i>
  <i style="--clr:#1226ff;"></i>
  <i style="--clr:#797979;"></i>
    <div class="login">
        <h2>Se Connecter</h2>
        <form action="../php/newUser.php" method="post">
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
        <a href="#">S'enregistrer</a>
      </div>
    </div>
  </div>
</div>
