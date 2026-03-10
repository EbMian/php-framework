<?php
//template film.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinéma MK3 - Film <?php echo $film->titre; ?></title>
  </head>
  <body>
    <h1>Cinéma MK3 - Film <?php echo $film->titre; ?></h1>
    <br>
    <?php include 'menu.php'?>
    <br>
    <h2>Détails du film</h2>
    <?php

    if(isset($film->id_distributeur) && isset($film->id_genre))
    {
      echo '<a href="index.php?action=genre&id=' .$film->id_genre. '">' .$film->genre->nom. '</a> réalisé par <a href="index.php?action=distributeur&id='.$film->id_distributeur.'">'.$film->distributeur->nom.'</a>';
    }
    elseif(!isset($film->id_distributeur) && isset($film->id_genre))
    {
      echo '<a href="index.php?action=genre&id=' .$film->id_genre. '">' .$film->genre->nom. '</a>';
    }
    elseif(!isset($film->id_genre) && isset($film->id_distributeur))
    {
      echo '<a href="index.php?action=distributeur&id=' .$film->id_distributeur. '">' .$film->distributeur->nom. '</a>';
    }
    echo'<br>';
    echo 'durée : '.$film->duree_minutes.' minutes';
    ?>
    <br>
    <br>
    <?php
    echo '<a href="index.php?action=delete-film&id='.$film->id_film.'"><button type="button">Supprimer</button></a>';
    ?>
  </body>
</html>