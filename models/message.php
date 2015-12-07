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
	
	function selectMessages($tableau, $key = null) {
		global $bdd;

		if(!$key) $key = key($tableau); 
		
		$request = 'SELECT id, titre, contenue, auteur, date FROM msg WHERE '.$key.' = :'.$key;
		
		$messages = $bdd->prepare($request);
		$messages->execute($tableau); 
	
		return $messages;
	}
?>