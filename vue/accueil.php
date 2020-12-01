<?php $title = 'Regarde et pense'; 
$css = 'public/style.css';?>

<?php ob_start(); ?>
   
		        
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
		<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<?php
		while ($donnees = $lastPosts->fetch()){
		?>
			<div class="carousel-item active">
			  <img src="public/images/cobayes_CIA.jpg" class="d-block w-100" alt="...">
			  <div class="carousel-caption d-none d-md-block">
			    <h5 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h5>
			    <p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($donnees['descriptif'])); ?></p>
			  </div>
			</div>
		<?php     //POUR RECUP LA CATEGORIE, AJOUTER WHERE id_categorie=1...
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



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>