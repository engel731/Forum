<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	function addMsg($data) {
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO msg(titre, contenue, auteur, idDiscussion) VALUES(:titre, :contenue, :auteur, :idDiscussion)');
		$req->execute($data);
	}

	function addDiscussion($data) {
		global $bdd;
		
		$req = $bdd->prepare('INSERT INTO discussion(titre, categorie, auteur) VALUES(:titre, :categorie, :auteur)');
		$req->execute($data);
	}

	function selectCategorie($tableau, $key = null) {
		global $bdd;

		if(!$key) $key = key($tableau); 
		
		$request = 'SELECT id, titre FROM categorie WHERE '.$key.' = :'.$key;

		$categorie = $bdd->prepare($request);
		$categorie->execute($tableau);
		
		while($donnees = $categorie->fetch()) {
			return $donnees;
		}
	}

	function selectDiscussion($tableau, $key = null) {
		global $bdd;

		if(!$key) $key = key($tableau); 
		
		$request = 'SELECT id, titre, categorie, auteur, date FROM discussion WHERE '.$key.' = :'.$key;
		
		$reponse = $bdd->prepare($request);
		$reponse->execute($tableau);
	
		while($donnees = $reponse->fetch()) {
			return $donnees;
		}
	}

	function generatId() {
		global $bdd;

		$reponse = $bdd->query('SELECT id FROM discussion');

		for ($i = 2; $i < $reponse->fetch(); $i++) { 
			return $i;
		}
	}
?>