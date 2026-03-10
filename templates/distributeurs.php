<?php
//template : genres.php
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
    <h1>Bienvenue sur le site du cinéma MK3</h1>
    <br>
    <?php include 'menu.php'?>
    <br>
    <h2>Liste des distributeurs</h2>
    <a href="http://localhost/mk3/index.php?action=add-distributeur">
      <button type="button">
        Ajouter un distributeur
      </button>
    </a>
    
    <ul>
    	<?php
    	foreach ($distributeurs as $distibuteur)
    	{
    		echo '<li><a href="index.php?action=distributeur&id='.$distibuteur->id_distributeur.'">'.$distibuteur->nom.'</a></li>';
    	}
    	?>
    </ul>
  </body>
</html>