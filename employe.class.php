<?php

require_once('table.class.php');

class Employe extends Table
{
	const TABLE_NAME = 'employes';
	const PRIMARY_KEY = 'id_employe';
	const FIELDS = ['id_personne','id_fonction','identifiant','mot_de_passe'];

	protected $id_employe;
	protected $id_personne;
    protected $id_fonction;
    protected $identifiant;
    protected $mot_de_passe;

	

    public function __construct($id = null)
	{
		$this->id_employe = $id;
	}

	public static function search_employe($login, $mdp=null)
	{
		if($login)
		{
			$sql = "select id_employe from employes where identifiant = "."'".$login."'";
			//var_dump($sql);
			//die();

			$id_employe = my_fetch_array($sql);
			
			//var_dump($id_employe);
			//die();
			return $id_employe;
		}
		elseif(($login) && ($mdp))
		{
			$sql = "select * from employes";
			var_dump($sql);
			die();

			$sql = "select id_employe from employes where identifiant = ".$login." and mot_de_passe=".$mdp;
			$id_employe = my_fetch_array($sql);
			
			var_dump($id_employe);
			die();
			return $id_employe;
		}
	}
	
}