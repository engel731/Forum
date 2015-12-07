<?php 
	require '../models/discussion.php';
	
	$categorie = selectCategorie($_GET, 'titre');
	$articles = selectArticles(array('categorie' => $categorie['titre']));

	require '../discussion.php';
?>