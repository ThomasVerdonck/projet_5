<?php $title = $sous_categorie; 
$css = 'public/style2.css';?>

<?php ob_start(); ?>
<div class="container py-5">
	 
	<h2>Catégorie: <?php echo nl2br(htmlspecialchars($categorie));?></h2>
	<h4>Genre: <?php echo nl2br(htmlspecialchars($sous_categorie));?></h3>
    <div class="row justify-content-center mt-3">
	    <?php    
	    while ($donnees = $posts->fetch()){
	    ?>
			<div class="card mb-3 col-lg-6" style="max-width: 540px;">
			  <div class="row">
			    <div class="col-md-4">
			      <a href="index.php?action=showPost&id=<?php echo $donnees['id']?>">
			      	<img class="card-img" src="public/images/<?php echo $donnees['image']; ?>" alt="<?php echo $donnees['image']; ?>">
			      </a>
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title"><?php echo nl2br(htmlspecialchars($donnees['titre'])); ?></h5>
			        <p class="card-text" id="contenu"><?php echo nl2br(htmlspecialchars($donnees['descriptif'])); ?></p>
			        <a href="index.php?action=showPost&id=<?php echo $donnees['id']?>" class="btn btn-primary">Voir plus</a>
			      </div>
			    </div>
			  </div>
			</div>			
		<?php
		}    
		$posts->closeCursor();
		?>	
	</div>			
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>