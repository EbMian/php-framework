<?php

require_once('table.class.php');

class Distributeur extends Table
{
	const TABLE_NAME = 'distributeurs';
	const PRIMARY_KEY = 'id_distributeur';
	const FIELDS = ['nom','telephone','adresse','cpostal','ville','pays'];

	protected $id_distributeur;
	protected $nom;
    protected $telephone;
    protected $adresse;
    protected $cpostal;
    protected $ville;
    protected $pays;

    public function __construct($id = null)
	{
		$this->id_distributeur = $id;
	}

	public function films()
	{
		$sql = "select id_film from films where id_distributeur=".$this->id_distributeur;
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