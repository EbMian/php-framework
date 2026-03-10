<?php
//template : home.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema MK3</title>
  </head>
  <body>
    <?php 
    if(isset($_SESSION['logged-in']))
	  {
      if($_SESSION['logged-in'] == true) 
      {
        echo '<p>Hello'.' '.$_SESSION['prenom'].' '.'</p>'; 
      }
    }
    ?>
    <h1>Bienvenue sur le site du cinéma MK3</h1>
    <br>
    <?php include 'menu.php'?>
    <br>
    <h2>Liste des films</h2>
    <br>
    <!-- <form method="post" action="controllers/home.controller.php?action=search-film">
      <input type="text" id="search" name="search">
      <button type="submit">Rechercher</button></a>
    </form> 
    <br>
    <br>-->
    <a href="http://localhost/mk3/index.php?action=add-film">
      <button type="button">Ajouter un film</button>
    </a>
    <ul>
    	<?php
      if(isset($_GET['result']))
      {
        if($_GET['result'] == true)
        {
          foreach ($search_result as $result)
          {
            echo '<li><a href="index.php?action=film&id='.$result->id_film.'">'.$result->titre.'</a></li>';
          }
        }
      }
      else 
      {
        foreach ($films as $film)
        {
          echo '<li><a href="index.php?action=film&id='.$film->id_film.'">'.$film->titre.'</a></li>';
        }
      }
    	?>
    </ul>
  </body>
</html>