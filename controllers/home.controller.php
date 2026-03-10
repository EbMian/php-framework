<?php
//home.controller.php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once __DIR__ . '/../film.class.php';
require_once __DIR__ . '/../personne.class.php';


if(isset($_GET['action']))
{
	$action = $_GET['action'];
}

if($action == 'home')
{
	$films = Film::all();
}

elseif($action == 'film')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$film = new Film($id);
		$film->hydrate();
	}
}

elseif($action == 'add-film')
{
	$distributeurs_possibles = Distributeur::all();
	$genres_possibles = Genre::all();

	if(isset($_POST['titre']))
	{
		$film = new Film();

		foreach($_POST as $column => $value) {
			$film->$column = $value;
		}

		$film->save();
		header('Location: http://localhost/mk3/index.php?action=home');
		exit;
	}

}

elseif($action == 'delete-film')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$film = new Film($id);
		$film->delete();

		header('Location: http://localhost/mk3/index.php?action=home');
		exit;
	}
}


elseif($action == 'add-distributeur')
{

	if(isset($_POST['nom']))
	{
		$distributeur = new Distributeur();

		foreach($_POST as $column => $value) {
			$distributeur->$column = $value;
		}

		$distributeur->save();
		header('Location: http://localhost/mk3/index.php?action=distributeurs');
		exit;
	}
}

elseif($action == 'genre')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$genre = new Genre($id);
		$genre->hydrate();
	}
}

elseif($action == 'genres')
{
	$genres = Genre::all();
}

elseif($action == 'distributeur')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];	
		$distributeur = new Distributeur($id);
		$distributeur->hydrate();
	}
}

elseif($action == 'distributeurs')
{
	$distributeurs = Distributeur::all();
}

elseif($action == 'add-genre')
{
	if(isset($_POST['field-name']))
	{
		$field_name = $_POST['field-name'];
		$genre = new Genre();
		$genre->nom = $field_name;
		$genre->save();
		header('Location: http://localhost/mk3/index.php?action=genres');
		exit;
	}
}

elseif($action == 'delete-genre')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$genre = new Genre($id);
		$genre->hydrate(); 
		if(!$genre->films)
		{
			$genre->delete();
			header('Location: http://localhost/mk3/index.php?action=genres');
			exit;
		}
		else
		{
			header('Location: http://localhost/mk3/index.php?action=genre&id='.$id.'&error=true');
			exit;
		}
		
	}
}

elseif($action == 'delete-distributeur')
{
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
		$distributeur = new Distributeur($id);
		$distributeur->hydrate(); 
		if(!$distributeur->films)
		{
			$distributeur->delete();
			header('Location: http://localhost/mk3/index.php?action=distributeurs');
			exit;
		}
		else 
		{
			header('Location: http://localhost/mk3/index.php?action=distributeur&id='.$id.'&error=true');
			exit;
		}
	}
}

elseif($action == 'search-film')
{
	if(isset($_POST['search']))
	{
		$search_query = $_POST['search'];
		$search_result = Film::search_film($search_query);
		
		// Cas chaine vide
		if(!$search_query)
		{
			header('Location: http://localhost/mk3/index.php?action=home');
			exit;
		}
		// Cas pas résultat
		if(!$search_result)
		{
			$genre->search($search);
			header('Location: http://localhost/mk3/index.php?action=home&result=false');
			exit;
		}
		// Cas résultat
		elseif($search_result)
		{
			header('Location: http://localhost/mk3/index.php?action=home&result=true');
			exit;
		}
		
	}
}

elseif($action == 'login')
{
	if(isset($_POST['email']))
	{
		$personne_login = $_POST['email'];
		$pwd = $_POST['password'];
		
		$personne_id = Personne::search_personne($personne_login, $pwd); // retourne l'id de la personne

		if(isset($_POST['previous_action']))
		{
			$previous_action = isset($_POST['previous_action']);

			// *************************TODO A tester************************* //
			// Cas ou login et mdp correct et l'utilisateur voulais accéder à une autre page à la base
			if(($personne_id) && ($previous_action))
			{
				header('Location: http://localhost/mk3/index.php?action='.$previous_action);
				exit;
			}
		}
		elseif($personne_id)
		{
			$id = $personne_id[0]['id_personne'];
			$personne = new Personne($id);			
			$personne->hydrate();
			$_SESSION['logged-in'] = true;
			$_SESSION['prenom'] = $personne->prenom;
			header('Location: http://localhost/mk3/index.php?action=home');
			exit;
		}
		
		// Cas login non connu ou mdp faux 
		elseif(!$personne_id)
		{
			header('Location: http://localhost/mk3/index.php?action=login&error=true');
			exit;
		}
		
	}
}

elseif($action == 'sign-up')
{
	if(isset($_POST['email']))
	{
		$login = $_POST['email'];
		// Check if the personne doesn't exit
		$personne_id = Personne::search_personne($login);

		$personne = new Personne();
		foreach($_POST as $column => $value) {
			$personne->$column = $value;
		}
		$personne->save();

		
		// Cas login déjà utilisé
		if($personne_id)
		{
			header('Location: http://localhost/mk3/index.php?action=login&error=true');
			exit;
		}

		// Cas sans previous action
		elseif((!$personne_id))
		{
			$_SESSION['logged-in'] = true;
			$_SESSION['prenom'] = $personne->prenom;
			header('Location: http://localhost/mk3/index.php?action=home');
			exit;
		}

		// Cas avec previous action
		if(isset($_POST['previous_action']))
		{
			if((!$personne_id) && ($previous_action))
			{
				$_SESSION['logged-in'] = true;
				header('Location: http://localhost/mk3/index.php?action='.$previous_action);
				exit;
			}
		}
		
		
	}

}

elseif($action == 'log-out')
{
	session_destroy();
	header('Location: http://localhost/mk3/index.php?action=home');
	exit;
}
