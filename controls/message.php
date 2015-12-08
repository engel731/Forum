<?php 
	require '../models/message.php';
	
	function check($data) {
		global $check;
		
		foreach($data as $key => $value) {
			if(!$check[$key]($value))
				return false;
		}
		
		return true;
	}

	function getTooltype($data, $msg) {
		global $check;
		
		$tooltypes = array();

		foreach($data as $key => $value) {
			if(!$check[$key]($value))
				array_push($tooltypes, $msg[$key]);
		}
		
		return $tooltypes;
	}

	$check = array(

	'titre' => function($titre) {
		if (strlen($titre) > 6)
			return true;
		else 
			return false;
	},

	'contenue' => function($contenue) {
		if(strlen($contenue) > 10) 
			return true;
		else 
			return false;
	},

	'auteur' => function(){ return true; },

	'idDiscussion' => function($id) {
		if(selectDiscussion(array('id' => $id)))
			return true;
		else
			return false;
	});
	
	$discussion = selectDiscussion(array('titre' => $_GET['discussion']));
	$messages = selectMessages(array('idDiscussion' => $discussion['id']));

	if(isset($_POST['titre'], $_POST['contenue'])) 
	{
		$data = array(
			'titre'        => $_POST['titre'], 
			'contenue'     => $_POST['contenue'], 
			'auteur'       => 'engel',
			'idDiscussion' => $discussion['id']);
	
		(check($data)) ? addMsg($data) : $tooltypes = getTooltype($data, array(
			'titre'        => 'Le titre doit comporter au minimum 6 caractere',
			'contenue'     => 'Le contenue doit comporter au minimum 10 caractere',
			'auteur'       => 'Vous devez vous connecter pour pouvoir poster un message',
			'idDiscussion' => 'Cette discussion n\'existe pas'));
	}

	require '../message.php';
?>