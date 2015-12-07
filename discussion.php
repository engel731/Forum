<!DOCTYPE html>
<html>
	<head>
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="../styles/style.css" />
		<title>Forum</title>
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
			<?php if($categorie['titre']): ?>
				
				<h1 id="titre"><?php echo htmlspecialchars($categorie['titre']); ?></h1>
				
				<section>
					<h1>
						<a href="newDiscussion.php?categorie=<?php echo $categorie['titre']; ?>">
							Crée une nouvelle discussion
						</a>
					</h1>
				</section>
				
				<?php foreach ($articles as $article): ?>
					
					<section>
						<h1>
							<a href="message.php?discussion=<?php echo $article['titre']; ?>">
								<?php echo htmlspecialchars($article['titre']); ?>
							</a>
						</h1>
						<aside>
							<span><?php echo htmlspecialchars($article['auteur']); ?></span>
							<span><?php echo htmlspecialchars($article['date']); ?></span>
						</aside>
					</section>
				
				<?php endforeach;
			
			else: ?>
		
				<h1 id="titre">Cette categorie n'existe pas !</h1>
				
				<section>
					<h1>Oups : Erreur 404</h1>
					<aside></aside>
				</section>
			
			<?php endif; ?>
		</div>
		
		<footer>
			<p>Information générale, Contact, Finance, dons</p>
		</footer>
	</body>
</html>