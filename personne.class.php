<?php

require_once('table.class.php');

class Personne extends Table
{
	const TABLE_NAME = 'personnes';
	const PRIMARY_KEY = 'id_personne';
	const FIELDS = ['nom','prenom','date_naissance','email','adresse','cpostal','ville','pays','login','mot_de_passe'];

	protected $id_personne;
	protected $nom;
    protected $prenom;
    protected $date_naissance;
    protected $email;
	protected $adresse;
	protected $cpostal;
	protected $ville;
	protected $pays;
	protected $login;
	protected $mot_de_passe;


    public function __construct($id = null)
	{
		$this->id_personne = $id;
	}

	public static function search_personne($email, $mdp=null)
	{	
		if($email)
		{
			$sql = "select id_personne from personnes where email = "."'".$email."'";
			$id_personne = my_fetch_array($sql);
			
			return $id_personne;
		}
		elseif(($email) && ($mdp))
		{

			$sql = "select id_personne from personnes where email = "."'".$email."'". "and mot_de_passe = "."'".$mdp."'";
			echo $sql;
			die();
			$id_personne = my_fetch_array($sql);
			
			return $id_personne;
		}
	}
	
}