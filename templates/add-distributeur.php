<?php
//template form.php
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
    <h2>Formulaire de d'ajout d'un distributeur</h2>
    <br>
    <?php include 'menu.php'?>
    <br>
    <form method="post" action="./controllers/home.controller.php?action=add-distributeur">
      <label for="nom">Nom</label>
      <input id="nom" name="nom" type="text">
      <br>
      <br>
      <label for="telephone">Téléphone</label>
      <input id="telephone" name="telephone" type="text">
      <br>
      <br>
      <label for="adresse">Adresse</label>
      <input id="adresse" name="adresse" type="text">
      <br>
      <br>
      <label for="cpostal">Code postal</label>
      <input id="cpostal" name="cpostal" type="text">
      <br>
      <br>
      <label for="ville">Ville</label>
      <input id="ville" name="ville" type="text">
      <br>
      <br>
      <label for="pays">Pays</label>
      <input id="pays" name="pays" type="text">
      <br>
      <br>
      
      <button type="submit">Envoyer</button>
    </form>
    
  </body>
</html>