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
			<?php if($discussion): ?>
				<h1 id="titre"><?php echo htmlspecialchars($discussion['titre']); ?></h1>

				<?php foreach ($messages as $message): ?>

					<section>
						<h1><?php echo htmlspecialchars($message['titre']) ?></h1>
						<article>
							<p><?php echo htmlspecialchars($message['contenue']) ?></p>
						</article>
						<aside>
							<span>Auteur : <?php echo htmlspecialchars($message['auteur']) ?></span>
							<span>Date : <?php echo htmlspecialchars($message['date']) ?></span>
						</aside>
					</section>
					
				<?php endforeach; ?>
				
				<section>
					<h1>Repondre !</h1>
					<article>
						<form method="post" action="message.php?discussion=<?php echo $discussion['titre']; ?>">
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

			<?php else: ?>
				<h1 id="titre">Cette discussion n'existe pas !</h1>
				
				<section>
					<h1>Oups : Erreur 404</h1>
					<aside></aside>
				</section>
			
			<?php endif; ?>
		</div>
		
		<footer>
			<p>Information générale, Contact, Finance, Dons</p>
		</footer>
	</body>
</html>