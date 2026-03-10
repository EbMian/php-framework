<?php

require_once('table.class.php');
require_once('genre.class.php');
require_once('distributeur.class.php');

class Film extends Table
{
	const DEBUG = true; // mettre a false pour arreter le debug

	const TABLE_NAME = 'films';
	const PRIMARY_KEY = 'id_film';
	const FIELDS = ['id_genre','id_distributeur','titre','resum','date_debut_affiche','date_fin_affiche','duree_minutes','annee_production'];

	protected $id_film;
    protected $id_genre;
    protected $id_distributeur;
    protected $titre;
    protected $resum;
    protected $date_debut_affiche;
    protected $date_fin_affiche;
    protected $duree_minutes;
    protected $annee_production;

    public function __construct($id = null)
	{
		$this->id_film = $id;
	}

	public function genre()
	{
		if (isset($this->id_genre))
		{
			$genre = new Genre($this->id_genre);
			$genre->hydrate();
			return $genre;
		}
	}

	public function distributeur()
	{
		if (isset($this->id_distributeur))
		{
			$distributeur = new Distributeur($this->id_distributeur);
			$distributeur->hydrate();
			return $distributeur;
		}
	}

	public static function search_film($search_query)
	{
		$sql = "select id_film from films where titre like '%".$search_query."%'";
		$id_films = my_fetch_array($sql);

		$collection = [];
		foreach ($id_films as $id_film)
		{
			$film = new Film($id_film['id_film']);
			$film->hydrate();
			$collection[] = $film;
		}

		return $collection;
	}
}