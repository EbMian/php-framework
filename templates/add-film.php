<?php
//template add-film.php
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
    <h2>Formulaire d'ajout d'un film</h2>
    <br>
    <?php include 'menu.php'?>
    <br>
    <form method="post" action="./controllers/home.controller.php?action=add-film">
      <label for="id_genre">Genre</label>
      <select name="id_genre" id="id_genre">
        <option value="">-- Sélectionner un genre --</option>
        <?php 
          foreach($genres_possibles as $genre)
          {
            echo '<option value="'.$genre->id_genre.'">'.$genre->nom.'</option>';
          }
        ?>
      </select>
      <br><br>
      <label for="id_distributeur">Distributeur</label>
      <select name="id_distributeur" id="id_distributeur">
        <option value="">-- Sélectionner un distributeur --</option>
        
        <?php 
          foreach($distributeurs_possibles as $distributeur)
          {
            echo '<option value="'.$distributeur->id_distributeur.'">'.$distributeur->nom.'</option>';
          }
        ?>
      </select>
      <br><br>
      <label for="titre">Titre</label>
      <input id="titre" name="titre" type="text">
      <br><br>
      <label for="resum">Résumé</label>
      <textarea id="resum" name="resum" type="resum"></textarea>
      <br><br>
      <label for="date_debut_affiche">Date debut affiche</label>
      <input id="date_debut_affiche" name="date_debut_affiche" type="text">
      <br><br>
      <label for="date_fin_affiche">Date fin affiche</label>
      <input id="date_fin_affiche" name="date_fin_affiche" type="text">
      <br><br>
      <label for="duree_minutes">Durée (minutes)</label>
      <input id="duree_minutes" name="duree_minutes" type="text">
      <br><br>
      <label for="annee_production">Année de production</label>
      <input id="annee_production" name="annee_production" type="text">
      <br><br>

      <button type="submit">Envoyer</button>
    </form>
    
  </body>
</html>