<?php

require_once('table.class.php');

class Genre extends Table
{
	const TABLE_NAME = 'genres';
	const PRIMARY_KEY = 'id_genre';
	const FIELDS = ['nom'];

	protected $id_genre;
	protected $nom;

	public function __construct($id = null)
	{
		$this->id_genre = $id;
	}

	public function films()
	{
		$sql = "select id_film from films where id_genre=".$this->id_genre;
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