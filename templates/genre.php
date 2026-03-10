<?php
//template genre.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinéma MK3 - Genre <?php echo $genre->nom; ?></title>
  </head>
  <body>
    <h1>Cinéma MK3 - Genre <?php echo $genre->nom; ?></h1>
    <br>
    <?php include 'menu.php'?>
    <br>
    <?php echo '<a href="index.php?action=delete-genre&id='.$genre->id_genre.'"><button type="button">Supprimer le genre</button></a><br>';
    if(isset($_GET['error']))
	  {
      echo '<p style="color:red;">Avant suppression du genre il est nécessaire de supprimer tous les films rattachés</p>';
    }
    ?>
    <h2>Liste des films du genre <?php echo $genre->nom; ?></h2>
    	<?php
    	foreach ($genre->films as $film)
    	{
    		echo '<li><a href="index.php?action=film&id='.$film->id_film.'">'.$film->titre.'</a></li>';
    	}
    	?>
    </ul>
  </body>
</html>