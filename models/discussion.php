<?php 
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
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

	function selectArticles($tableau, $key = null) {
		global $bdd;

		if(!$key) $key = key($tableau); 

		$request = 'SELECT titre, categorie, auteur, date FROM discussion WHERE '.$key.' = :'.$key;
		
		$articles = $bdd->prepare($request);
		$articles->execute($tableau);
		
		return $articles;	
	}
?>