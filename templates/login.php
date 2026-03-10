<?php
//template login.php
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
    <h2>Formulaire de connexion</h2>
    <br>
    <?php include 'menu.php'?>
    <br>
    <?php
    if(isset($_GET['error']))
	{
      echo "<p style='color:red'>Les valeurs de mot de passe et ou d'identifiant ne sont pas corrects</p>";
    }
    ?>
    <form method="post" action="./controllers/home.controller.php?action=login">
      <label for="email">Adresse e-mail</label>
      <input id="email" name="email" type="text">
      <br><br>
      <label for="password">Mot de passe</label>
      <input id="password" name="password" type="password">
      <br><br>

      <button type="submit">Envoyer</button>
    </form>
    
  </body>
</html>