<?php
//template menu.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();
?>

<p>Menu</p>
<ul>
    <li>
        <a href="http://localhost/mk3/index.php">Films</a>
    </li>
    <li>
        <a  href="http://localhost/mk3/index.php?action=genres">Genres</a>
    </li>
    <li>
        <a href="http://localhost/mk3/index.php?action=distributeurs">Distributeurs</a>
    </li>
    <?php
    if(!isset($_SESSION['logged-in']))
	{echo 
        '<li>
        <a href="http://localhost/mk3/index.php?action=login">Connexion</a>
        </li>
        <li>
            <a href="http://localhost/mk3/index.php?action=sign-up">Inscription</a>
        </li>';
    }
    ?>
    <?php
    if(isset($_SESSION['logged-in']))
	{
      echo '<a href="http://localhost/mk3/index.php?action=log-out"><button type="button">Déconnexion</button></a>';
    }
    ?>
</ul>
