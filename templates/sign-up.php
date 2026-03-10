<?php
//template sign-up.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinéma MK3 - Formulaire</title>
  </head>
  <body>
    <h1>Cinéma MK3 - Formulaire</h1>
    <br>
    <h2>Formulaire d'inscription</h2>
    <br>
    <?php include 'menu.php'?>
    <br>
    <?php 
    if(isset($_GET['error']))
	{
      echo "<p style='color:red;'>Un compte existe déjà avec cet identifiant ou au moins une des valeurs n'est pas au bon format</p>";
    }
    ?>
    <br>
    <form method="post" action="./controllers/home.controller.php?action=sign-up">
      <label for="email">Adresse e-mail</label>
      <input id="email" name="email" type="text">
      <br><br>
      <label for="nom">Nom</label>
      <input id="nom" name="nom" type="text">
      <br><br>
      <label for="prenom">Prénom</label>
      <input id="prenom" name="prenom" type="text">
      <br><br>
      <label for="date_naissance">Date de naissance</label>
      <input id="date_naissance" name="date_naissance" type="text" placeholder="AAAA-MM-DD">
      <br><br>
      <label for="adresse">Adresse</label>
      <input id="adresse" name="adresse" type="text">
      <br><br>
      <label for="cpostal">Code postal</label>
      <input id="cpostal" name="cpostal" type="text">
      <br><br>
      <label for="ville">Ville</label>
      <input id="ville" name="ville" type="text">
      <br><br>
      <label for="pays">Pays</label>
      <input id="pays" name="pays" type="text">
      <br><br>
      <label for="mot_de_passe">Mot de passe</label>
      <input id="mot_de_passe" name="mot_de_passe" type="password">
      <br><br>

      <button type="submit">Envoyer</button>
    </form>
    
  </body>
</html>