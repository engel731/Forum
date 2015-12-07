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
	
	if(check($data)) 
		addMsg($data);
	}

	require '../message.php';
?>