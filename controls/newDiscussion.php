<?php 
	require '../models/newDiscussion.php';
	
	function check($data, $check) {
		foreach($data as $key => $value) {
			if(!$check[$key]($value))
				return false;
		}
		
		return true;
	}

	$checkMsg = array(

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

	
	$checkDiscussion = array(

	'titre' => function($titre) {
		if (strlen($titre) > 6)
			return true;
		else 
			return false;
	},

	'categorie' => function($categorie) {
		if(selectCategorie(array('titre' => $categorie)))
			return true;
		else 
			return false;
	},

	'auteur' => function(){ return true; });

	$categorie = selectCategorie(array('titre' => $_GET['categorie']));

	if(isset($_POST['titre'], $_POST['contenue'])) 
	{
		$dataMsg = array(
			'titre'        => $_POST['titre'], 
			'contenue'     => $_POST['contenue'], 
			'auteur'       => 'engel',
			'idDiscussion' => generatId());
	
		$dataDiscussion = array(
			'titre'     => $_POST['titre'],
			'categorie' => $categorie['titre'],
			'auteur'    => 'engel');

		if(check($dataDiscussion, $checkDiscussion)) {
			addDiscussion($dataDiscussion);
			
			if(check($dataMsg, $checkMsg))
				addMsg($dataMsg);
		}
	}

	require '../newDiscussion.php';
?>