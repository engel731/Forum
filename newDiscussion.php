<!DOCTYPE html>
<html>
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../styles/style.css" />
		<title>Forum free-cube.fr</title>
	</head>
	
	<body>		
		<header>
			<div id="banniere">
				<h1>Bienvenue sur Free-cube !</h1>
				<!-- <img id="logo" src="#" alt="#" /> -->
			</div>
			<nav>	
				<ul>
					<li><a href="../index.html">Forum</a></li>
					<li><a href="#">adem</a></li>
					<li><a href="#">rorain</a></li>
					<li><a href="#">porro</a></li>
					<li><a href="#">facera</a></li>
					<li><a href="#">terra</a></li>
				</ul>
			</nav>
		</header>
		
		<div id="displayUser">
			<span>Bienvenue visiteur !</span>
		</div>
		
		<div id="mainSection">
			<h1 id="titre">Crée une nouvelle discussion !</h1>
			
			<section>
				<h1>Formulaire </h1>
				<article>
					<form method="post" action="newDiscussion.php?categorie=<?php echo $categorie['titre']; ?>">
						<input placeholder="Titre du message" name="titre" type="text" /><br ><br />
						<textarea name="contenue" rows="13" cols="75" placeholder="Ecrivez votre texte ici"></textarea><br /><br />
						
						<input type="submit" value="Envoyer"/>
					</form>
					<?php if(isset($tooltypes)) {
						foreach ($tooltypes as $value) {
							echo '<p>'.$value.'</p>';
						}
					}?>
				</article>
			</section>
		</div>
		
		<footer>
			<p>Information générale, Contact, Finance, Dons</p>
		</footer>
	</body>
</html>