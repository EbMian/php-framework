<?php
//template add-genre.php
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
    <?php include 'menu.php'?>
    <br>
    <h2>Formulaire d'ajout d'un genre</h2>
    <form method="post" action="./controllers/home.controller.php?action=add-genre">
        <label for="field-name">Nom</label>
        <input id="field-name" name="field-name" type="text">
        
        <button type="submit">Envoyer</button>
    </form>
    
  </body>
</html>