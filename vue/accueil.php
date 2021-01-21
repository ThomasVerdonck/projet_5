<?php $title = 'Regarde et pense'; 
$css = 'public/style.css';?>

<?php ob_start();?>
<div class="container mt-5 py-5">				
 
	<div class="container py-5">
		<h2>Dernières mises à jour:</h2>		        
		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
			</ol>
			<div class="carousel-inner">
			<?php
			$ligne = 1;
			while ($donnees = $lastPosts->fetch()){
				if ($ligne === 1) {
				?>
					<div class="carousel-item active" style="background-image:url(<?php echo $donnees['image']; ?>)">
						<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
							<img src="public/images/<?php echo $donnees['image']; ?>" class="d-block w-100" alt="<?php echo $donnees['image']; ?>">
						</a>
					    <div id="texte" class="carousel-caption d-none d-md-block">
					    	<h4 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h4>
						</div>
					</div>
				<?php
				}
				else{
				?>					
					<div class="carousel-item">
						<a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
							<img src="public/images/<?php echo $donnees['image']; ?>" class="d-block w-100" alt="<?php echo $donnees['image']; ?>">
						</a>
						<div id="texte" class="carousel-caption d-none d-md-block">
					    	<h4 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h4>
						</div>
					</div>
				<?php
				}
				$ligne++;
			}
			$lastPosts->closeCursor();
			?>
			</div>			
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>			
		</div>
	</div>
</div>

<div id="presentation">
  	<p id="texte_accueil"><?php echo htmlspecialchars_decode(stripslashes($presentationText['texte'])); ?></p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>